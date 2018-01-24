<?php

namespace App\Transformers;

use App\Models\Slider;
use Carbon\Carbon;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class SliderTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform(Slider $slider)
    {
        return [
            'id' => $slider->id,
            'title' => $slider->title,
            'description' => $slider->description,
            'image' => $slider->image,
            'status' => $slider->status,
            'created_at' => Carbon::now()->format('d M Y'),
            'updated_at' => Carbon::now()->format('d M Y'),
			
        ];
    }
}
