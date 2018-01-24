<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::where('status','=','1')->orderBy('created_at', 'desc')->paginate(10);
        return view('categories.index')->with('menu','categories')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create')->with('menu','categories');
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
        $destinationPath  = 'uploads'.'/images'.'/categories/';
        $filename         = str_random(15).'.'.$extension;
        $des_filename     = $destinationPath.$filename;
        $upload_success   = $request->file('image')->move($destinationPath, $filename);

        $category = new Categories([
            'title'       => $request->get('title'),
            'description' => $request->get('caption'),
            'image'       => $des_filename,
            'status'      => $request->get('status'),
            'slug'      => Str::slug($request->get('title')),
        ]);

        $category->save();
        Session::flash('flash_message', 'Category successfully added!');
        return Redirect::route('categories.index');
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
        $category = Categories::find($id);
        return view('categories.edit')->with('menu','categories')->with('category',$category);
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

        $category = Categories::find($id);
        if($request->file('image') != null){
            $extension        = $request->file('image')->getClientOriginalExtension();
            $destinationPath  = 'uploads'.'/images'.'/categories/';
            $filename         = str_random(15).'.'.$extension;
            $des_filename     = $destinationPath.$filename;
            $upload_success   = $request->file('image')->move($destinationPath, $filename);

            $category->title       = $request->get('title');
            $category->description = $request->get('caption');
            $category->image       = $des_filename;
            $category->status      = $request->get('status');
            $category->slug        = Str::slug($request->get('title'));

        }else{
            $category->title       = $request->get('title');
            $category->description = $request->get('caption');
            $category->status      = $request->get('status');
            $category->slug        = Str::slug($request->get('title'));
        }
        $category->save();
        Session::flash('flash_message', 'Category successfully modified!');
        return Redirect::route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =(int)$id;
        $category = Categories::find($id);
        $category->delete();

        // redirect
        Session::flash('flash_message', 'Successfully deleted a Category!');
        return Redirect::route('categories.index');
    }
}
