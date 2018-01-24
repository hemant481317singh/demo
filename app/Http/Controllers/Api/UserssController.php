<?php

namespace App\Http\Controllers\Api;

use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;

class UserssController extends Controller
{

    public function index()
    {
        $users = User::all();
        return Fractal::collection($users, new UserTransformer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $users = new User;

        $users->id = $request->id;
        $users->username = $request->username;
        $users->email_id = $request->email_id;
        $users->password = $request->password;
        $users->remember_token = $request->remember_token;
        $users->status = $request->status;
        $users->created_at = $request->created_at;
        $users->updated_at = $request->updated_at;
        $users->save();

        return Fractal::item($users, new UserTransformer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return Fractal::item($users, new UserTransformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
