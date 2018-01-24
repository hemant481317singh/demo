<?php

namespace App\Http\Controllers;
use App\Models\Producttypes;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProducttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = Producttypes::where('status','=','1')->orderBy('created_at', 'desc')->paginate(10);
        return view('producttype.index')->with('menu','producttype')->with('producttype',$producttype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::pluck('title','id');
        return view('producttype.create')->with('menu','producttype')->with('category',$category);
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
            'category'    => 'required',
            'status'      => 'required'
        ]);

        $extension        = $request->file('image')->getClientOriginalExtension();
        $destinationPath  = 'uploads'.'/images'.'/producttype/';
        $filename         = str_random(15).'.'.$extension;
        $des_filename     = $destinationPath.$filename;
        $upload_success   = $request->file('image')->move($destinationPath, $filename);

        $producttype = new Producttypes([
            'title'       => $request->get('title'),
            'description' => $request->get('caption'),
            'image'       => $des_filename,
            'category_id' => $request->category,
            'status'      => $request->get('status'),
            'slug'      => Str::slug($request->get('title')),

        ]);

        $producttype->save();
        Session::flash('flash_message', 'Product-type successfully added!');
        return Redirect::route('producttype.index');
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
        $producttype = Producttypes::find($id);
        $category    = Categories::pluck('title','id');
        return view('producttype.edit')->with('menu','producttype')->with('producttype',$producttype)->with('category',$category);
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
            'category'    => 'required',
            'status'      => 'required'
        ]);

        $producttype = Producttypes::find($id);
        if($request->file('image') != null){
            $extension        = $request->file('image')->getClientOriginalExtension();
            $destinationPath  = 'uploads'.'/images'.'/producttype/';
            $filename         = str_random(15).'.'.$extension;
            $des_filename     = $destinationPath.$filename;
            $upload_success   = $request->file('image')->move($destinationPath, $filename);

            $producttype->title       = $request->get('title');
            $producttype->description = $request->get('caption');
            $producttype->image       = $des_filename;
            $producttype->category_id = $request->get('category');
            $producttype->status      = $request->get('status');
            $producttype->slug        = Str::slug($request->get('title'));

        }else{
            $producttype->title       = $request->get('title');
            $producttype->description = $request->get('caption');
            $producttype->category_id = $request->get('category');
            $producttype->status      = $request->get('status');
            $producttype->slug        = Str::slug($request->get('title'));
        }
        $producttype->save();
        Session::flash('flash_message', 'Product Type successfully modified!');
        return Redirect::route('producttype.index');
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
        $producttype = Producttypes::find($id);
        $producttype->delete();

        // redirect
        Session::flash('flash_message', 'Successfully deleted a Product Type!');
        return Redirect::route('producttype.index');
    }
    public function getProducttype($id){
        $producttypelist = Producttypes::where('category_id','=',$id)->where('status','=','1')->get();
        //$producttype = $producttypelist->lists('title','id');
        return response()->json($producttypelist);
    }
}
