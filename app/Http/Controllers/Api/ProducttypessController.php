<?php

namespace App\Http\Controllers\Api;

use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Carbon\Carbon;
use App\Models\Producttypes;
use Illuminate\Http\Request;
use App\Transformers\ProducttypesTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProducttypessController extends Controller
{
    public function index()
    {
        $producttypes = Producttypes::all();
        return Fractal::collection($producttypes, new ProducttypesTransformer);
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

        $producttypes = new Producttypes;

        $producttypes->title = $request->title;
        $producttypes->description = $request->description;
        $producttypes->image = $request->image;
        $producttypes->category_id = $request->category_id;
        $producttypes->status = $request->status;
        $producttypes->slug = str_slug($request->title);
        $producttypes->save();

        return Fractal::item($producttypes, new ProducttypesTransformer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($producttypes, Request $request)
    {
        $producttypes = Producttypes::where('id',$producttypes)->firstOrFail();
        return Fractal::item($producttypes, new ProducttypesTransformer);
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
    public function update(Request $request, $producttypes)
    {
        DB::table('producttypes')
            ->where('id', $producttypes)
            ->update(
                [
                    'title' => $request->get('title'),
                    'description' =>$request->get('description'),
                    'image' => $request->get('image'),
                    'category_id' => $request->get('category_id'),
                    'status' => $request->get('status'),
                    'updated_at' => Carbon::now()
                ]
            );
        $producttypes = Producttypes::where('id',$producttypes)->firstOrFail();
        return Fractal::item($producttypes, new ProducttypesTransformer);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producttypes, Request $request)
    {
        $producttypes = Producttypes::where('id',$producttypes)->firstOrFail();
        $producttypes->delete();
        return response(null,200);
    }
}
