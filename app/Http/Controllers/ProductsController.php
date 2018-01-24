<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Producttypes;
use Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(){
        User::create([
            'email_id' => 'sushant.bhandi94@gmail.com',
            'password' => Hash::make('sushant'),
        ]);
        return "done";
    }
    public function index()
    {
        $products = Products::where('status','=','1')->orderBy('created_at', 'desc')->paginate(10);
        return view('products.index')->with('menu','products')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::pluck('title','id');
        return view('products.create')->with('menu','products')->with('category',$category);
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
            'category'    => 'required',
            'producttype' => 'required',
            'code'        => 'required|max:100',
            'image'       => 'required | mimes:jpeg,jpg,png | max:1000',
            'status'      => 'required'
        ]);
        $extension        = $request->file('image')->getClientOriginalExtension();
        $destinationPath  = 'uploads'.'/images'.'/products/';
        $filename         = str_random(15).'.'.$extension;
        $des_filename     = $destinationPath.$filename;
        $upload_success   = $request->file('image')->move($destinationPath, $filename);

        $product = new Products([
            'code'            => $request->get('code'),
            'category_id'     => $request->category,
            'producttype_id'  => $request->producttype,
            'image'           => $des_filename,
            'height'          => $request->get('height'),
            'height_unit'     => $request->get('height_unit'),
            'width'           => $request->get('width'),
            'width_unit'      => $request->get('width_unit'),
            'colour'          => $request->get('colour'),
            'series'          => $request->get('series'),
            'application'     => $request->get('application'),
            'finish'          => $request->get('finish'),
            'body'            => $request->get('body'),
            'frontresistant'  => $request->get('frontresistant'),
            'pei'             => $request->get('pei'),
            'mohs'            => $request->get('mohs'),
            'cof'             => $request->get('cof'),
            'dcof'            => $request->get('dcof'),
            'thickness'       => $request->get('thickness'),
            'price'           => $request->get('price'),
            'pricesqft'       => $request->get('pricesqft'),
            'conversion'      => $request->get('conversion'),
            'pieces'          => $request->get('pieces'),
            'weight_piece'    => $request->get('weightperpieces'),
            'weight_box'      => $request->get('weightperbox'),
            'box_pallet'      => $request->get('boxperpallet'),
            'pieces_pallet'   => $request->get('piecesperpallet'),
            'status'          => $request->get('status')
        ]);
        $product->save();
        Session::flash('flash_message', 'Product successfully added!');
     //   return Redirect::route('products.index');
        return redirect()->route('products.index');
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
        $category = Categories::pluck('title','id');
        $products = Products::find($id);
        $producttypelist = Producttypes::where('category_id','=',$products->category_id)->where('status','=','1')->get();
        $producttype =$producttypelist->pluck('title','id');
        return view('products.edit')->with('menu','products')->with('category',$category)->with('producttype',$producttype)->with('products',$products);
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
            'category'    => 'required',
            'producttype' => 'required',
            'code'        => 'required|max:100',
            'image'       => 'mimes:jpeg,jpg,png | max:1000',
            'status'      => 'required'
        ]);

        $products = Products::find($id);
        if($request->file('image') != null){
            $extension        = $request->file('image')->getClientOriginalExtension();
            $destinationPath  = 'uploads'.'/images'.'/products/';
            $filename         = str_random(15).'.'.$extension;
            $des_filename     = $destinationPath.$filename;
            $upload_success   = $request->file('image')->move($destinationPath, $filename);

            $products->code            = $request->get('code');
            $products->category_id     = $request->category;
            $products->producttype_id  = $request->producttype;
            $products->image           = $des_filename;
            $products->height          = $request->get('height');
            $products->height_unit     = $request->get('height_unit');
            $products->width           = $request->get('width');
            $products->width_unit      = $request->get('width_unit');
            $products->colour          = $request->get('colour');
            $products->series          = $request->get('series');
            $products->application     = $request->get('application');
            $products->finish          = $request->get('finish');
            $products->body            = $request->get('body');
            $products->frontresistant  = $request->get('frontresistant');
            $products->pei             = $request->get('pei');
            $products->mohs            = $request->get('mohs');
            $products->cof             = $request->get('cof');
            $products->dcof            = $request->get('dcof');
            $products->thickness       = $request->get('thickness');
            $products->price           = $request->get('price');
            $products->pricesqft       = $request->get('pricesqft');
            $products->conversion      = $request->get('conversion');
            $products->pieces          = $request->get('pieces');
            $products->weight_piece    = $request->get('weightperpieces');
            $products->weight_box      = $request->get('weightperbox');
            $products->box_pallet      = $request->get('boxperpallet');
            $products->pieces_pallet   = $request->get('piecesperpallet');
            $products->status          = $request->get('status');

        }else{
            $products->code            = $request->get('code');
            $products->category_id     = $request->category;
            $products->producttype_id  = $request->producttype;
            $products->height          = $request->get('height');
            $products->height_unit     = $request->get('height_unit');
            $products->width           = $request->get('width');
            $products->width_unit      = $request->get('width_unit');
            $products->colour          = $request->get('colour');
            $products->series          = $request->get('series');
            $products->application     = $request->get('application');
            $products->finish          = $request->get('finish');
            $products->body            = $request->get('body');
            $products->frontresistant  = $request->get('frontresistant');
            $products->pei             = $request->get('pei');
            $products->mohs            = $request->get('mohs');
            $products->cof             = $request->get('cof');
            $products->dcof            = $request->get('dcof');
            $products->thickness       = $request->get('thickness');
            $products->price           = $request->get('price');
            $products->pricesqft       = $request->get('pricesqft');
            $products->conversion      = $request->get('conversion');
            $products->pieces          = $request->get('pieces');
            $products->weight_piece    = $request->get('weightperpieces');
            $products->weight_box      = $request->get('weightperbox');
            $products->box_pallet      = $request->get('boxperpallet');
            $products->pieces_pallet   = $request->get('piecesperpallet');
            $products->status          = $request->get('status');
        }
        $products->save();
        Session::flash('flash_message', 'Product successfully modified!');
        return Redirect::route('products.index');
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
        $products = Products::find($id);
        $products->delete();

        // redirect
        Session::flash('flash_message', 'Successfully deleted a Product!');
        return Redirect::route('products.index');
    }
}
