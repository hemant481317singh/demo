<?php

namespace App\Transformers;

use App\Models\Producttypes;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class ProducttypesTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = ['category','products'];

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
    public function transform(Producttypes $producttypes)
    {
        return [

            'id' => $producttypes->id,
            'title' => $producttypes->title,
            'description' => $producttypes->description,
            'image' => $producttypes->image,
            'category_id' => $producttypes->category_id,
            'status' => $producttypes->status,
            'slug' => $producttypes->slug,
            'created_at' => $producttypes->created_at->format('d M Y'),
            'updated_at' => $producttypes->updated_at->format('d M Y'),
			
        ];
    }
    public function includecategoryProducttypes(Producttypes $producttypes)
    {
        return $this->item($producttypes->category, new CategoriesTransformer());
    }
    public function includeproductsProducttypes(Producttypes $producttypes)
    {
        return $this->collection($producttypes->products, new ProductsTransformer());
    }
}
