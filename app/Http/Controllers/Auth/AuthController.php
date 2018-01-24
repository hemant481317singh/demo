<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use  ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Author: Anil Bhandi
     * Description: User defined functions for login and change password
     */

    //GET Login
    public function getLogin(){
        return view('account.login');
    }

    //POST Login
    public function postLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }

        $auth = Auth::attempt(array(
            'email_id'  => $request->input('email'),
            'password'   => $request->input('password'),
        ), $request->input('remember'));

        if($auth){
            return Redirect::route('home');
        }else {
            return Redirect::route('login')->with('global','Username or password is Incorrect.');
        }

        return Redirect::route('login')->with('global','There is a problem signing in try again later');

    }

    //Dashboard (Home page)
    public function getDashboard(){
        return view('index')->with('menu','home');
    }

    //LOGOUT
    public function logout(){
        Auth::logout();
        return Redirect::route('login');
    }

    /*
    * Change password zone
    */

    //Get request for reset password.
    public function getChangePassword() {
        return view('account.reset');
    }

    //Post request for reset password.
    public function postChangePassword(Request $request) {

        //Validate input for email.
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('reset')->withErrors($validator)->withInput();
        } else {

            $token = md5(str_random(7));
            $email = $request->input('email');

            $user = User::where('email', '=', $email)->update(['auth_token' => $token, 'token_expire' => time()+(2*3600)]);

            //If password updated send mail with the link.
            if($user) {

                //Mail Trigger.
                Mail::queue( 'account.reset_activate', array( 'email' => $email, 'token' => $token), function( $message ) use ($email){
                    $message->to( $email )->from( 'abhi@kokum.io', 'Kokum.IO' )->subject( 'Kokum.IO - Password Reset Request' );
                });

                return Redirect::route('login')->with('global','We have sent you an email to reset your password');
            }
        }
    }
}
