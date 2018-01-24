<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Transformers\SliderTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SliderssController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return Fractal::collection($slider, new SliderTransformer);
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
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $request->image;
        $slider->status = $request->status;
        $slider->save();
        return Fractal::item($slider, new SliderTransformer);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($slider,Request $request)
    {
        $slider = Slider::where('id',$slider)->firstOrFail();
        return Fractal::item($slider, new SliderTransformer);
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
     * @param  int  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider)
    {
        DB::table('sliders')
            ->where('id', $slider)
            ->update(
                [
                    'title' => $request->get('title'),
                    'description' =>$request->get('description'),
                    'image' => $request->get('image'),
                    'status' => $request->get('status'),
                    'updated_at' => Carbon::now()
                ]
            );
        $slider = Slider::where('id',$slider)->firstOrFail();
        return Fractal::item($slider, new SliderTransformer);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider,Request $request)
    {
          $slider = Slider::where('id',$slider)->firstOrFail();
          $slider->delete();
          return response(null,200);
    }
}
