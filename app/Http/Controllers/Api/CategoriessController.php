<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Transformers\CategoriesTransformer;


class CategoriessController extends Controller
{

    public function index()
    {
        $category = Categories::all();
        return Fractal::collection($category, new CategoriesTransformer);
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


        $category = new Categories;

        $category->title = $request->title;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->status = $request->status;
        $category->slug = str_slug($request->title);
        $category->save();

         return Fractal::item($category, new CategoriesTransformer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, Request $request)
    {
        $category = Categories::where('id',$category)->firstOrFail();
        return Fractal::item($category, new CategoriesTransformer);
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
    public function update(Request $request, $category)
    {
        DB::table('categories')
            ->where('id', $category)
            ->update(
                [
                    'title' => $request->get('title'),
                    'description' =>$request->get('description'),
                    'image' => $request->get('image'),
                    'status' => $request->get('status'),
                    'updated_at' => Carbon::now()
                ]
            );
        $category = Categories::where('id',$category)->firstOrFail();
        return Fractal::item($category, new CategoriesTransformer);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $category)
    {
        $category = Categories::where('id',$category)->firstOrFail();
        $category->delete();
        return response(null,200);
    }
}
