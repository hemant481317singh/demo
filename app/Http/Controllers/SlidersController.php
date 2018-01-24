<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Redirect;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::where('status','=','1')->orderBy('created_at', 'desc')->paginate(10);
        return view('slider.index')->with('menu','slider')->with('slider',$slider);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create')->with('menu','slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:100',
            'caption'     => 'required|max:500',
            'image'       => 'required | mimes:jpeg,jpg,png | max:1000',
            'status'      => 'required'
        ]);

        $extension        = $request->file('image')->getClientOriginalExtension();
        $destinationPath  = 'uploads'.'/images/';
        $filename         = str_random(15).'.'.$extension;
        $des_filename     = $destinationPath.$filename;
        $upload_success   = $request->file('image')->move($destinationPath, $filename);

        $slider = new Slider([
            'title'       => $request->get('title'),
            'description' => $request->get('caption'),
            'image'       => $des_filename,
            'status'      => $request->get('status')
        ]);

        $slider->save();
        Session::flash('flash_message', 'Slider successfully added!');
        return Redirect::route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int)$id;
        $slider = Slider::find($id);
        return view('slider.edit')->with('menu','slider')->with('slider',$slider);
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
        $this->validate($request, [
            'title'       => 'required|max:100',
            'caption'     => 'required|max:500',
            'image'       => 'mimes:jpeg,jpg,png | max:1000',
            'status'      => 'required'
        ]);

        $slider = Slider::find($id);
        if($request->file('image') != null){
            $extension        = $request->file('image')->getClientOriginalExtension();
            $destinationPath  = 'uploads'.'/images/';
            $filename         = str_random(15).'.'.$extension;
            $des_filename     = $destinationPath.$filename;
            $upload_success   = $request->file('image')->move($destinationPath, $filename);

            $slider->title       = $request->get('title');
            $slider->description = $request->get('caption');
            $slider->image       = $des_filename;
            $slider->status      = $request->get('status');

        }else{
            $slider->title       = $request->get('title');
            $slider->description = $request->get('caption');
            $slider->status      = $request->get('status');
        }
        $slider->save();
        Session::flash('flash_message', 'Slider successfully modified!');
        return Redirect::route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $id =(int)$id;
        $slider = Slider::find($id);
        $slider->delete();

        // redirect
        Session::flash('flash_message', 'Successfully deleted a slider!');
        return Redirect::route('slider.index');
    }
}
