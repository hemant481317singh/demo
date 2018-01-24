<?php

namespace App\Http\Controllers\Api;

use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ProductsTransformer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductssController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return Fractal::collection($products, new ProductsTransformer);
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
        $products = new Products;

        $products->code = $request->code;
        $products->category_id = $request->category_id;
        $products->producttype_id = $request->producttype_id;
        $products->image = $request->image;
        $products->height = $request->height;
        $products->height_unit = $request->height_unit;
        $products->width = $request->width;
        $products->width_unit = $request->width_unit;
        $products->colour = $request->colour;
        $products->series = $request->series;
        $products->application = $request->application;
        $products->finish = $request->finish;
        $products->body = $request->body;
        $products->frontresistant = $request->frontresistant;
        $products->pei = $request->pei;
        $products->mohs = $request->mohs;
        $products->cof = $request->cof;
        $products->dcof = $request->dcof;
        $products->thickness = $request->thickness;
        $products->price = $request->price;
        $products->pricesqft = $request->pricesqft;
        $products->conversion = $request->conversion;
        $products->pieces = $request->pieces;
        $products->weight_piece = $request->weight_piece;
        $products->weight_box = $request->weight_box;
        $products->box_pallet = $request->box_pallet;
        $products->pieces_pallet = $request->pieces_pallet;
        $products->status = $request->status;
        $products->save();

        return Fractal::item($products, new ProductsTransformer);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($products, Request $request)
    {
        $products = Products::where('id',$products)->firstOrFail();
        return Fractal::item($products, new ProductsTransformer);
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
    public function update(Request $request, $products)
    {
        DB::table('products')
            ->where('id', $products)
            ->update(
                [
                    'code' => $request->get('code'),
                    'category_id' =>$request->get('category_id'),
                    'producttype_id' => $request->get('producttype_id'),
                    'image' => $request->get('image'),
                    'height' => $request->get('height'),
                    'height_unit' => $request->get('height_unit'),
                    'width' => $request->get('width'),
                    'width_unit' => $request->get('width_unit'),
                    'colour' => $request->get('colour'),
                    'series' => $request->get('series'),
                    'application' => $request->get('application'),
                    'finish' => $request->get('finish'),
                    'body' => $request->get('body'),
                    'frontresistant' => $request->get('frontresistant'),
                    'pei' => $request->get('pei'),
                    'mohs' => $request->get('mohs'),
                    'cof' => $request->get('cof'),
                    'dcof' => $request->get('dcof'),
                    'thickness' => $request->get('thickness'),
                    'price' => $request->get('price'),
                    'pricesqft' => $request->get('pricesqft'),
                    'conversion' => $request->get('conversion'),
                    'pieces' => $request->get('pieces'),
                    'weight_piece' => $request->get('weight_piece'),
                    'weight_box' => $request->get('weight_box'),
                    'box_pallet' => $request->get('box_pallet'),
                    'pieces_pallet' => $request->get('pieces_pallet'),
                    'status' => $request->get('status'),
                    'updated_at' => Carbon::now()
                ]
            );
        $products = Products::where('id',$products)->firstOrFail();
        return Fractal::item($products, new ProductsTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($products, Request $request)
    {
        $products = Products::where('id',$products)->firstOrFail();
        $products->delete();
        return response(null,200);
    }
}
