<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal;
use App\Models\Categories;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class CategoriesTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = ['producttypes','products'];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];
    protected $created_at;

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform(Categories $category)
    {
        return [
            'id' => $category->id,
            'title' => $category->title,
            'description' => $category->description,
            'image' => $category->image,
            'status' => $category->status,
            'slug' => $category->slug,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
    public function includeproducttypeCategories(Categories $category)
    {
        return $this->collection($category->producttypes, new ProducttypesTransformer());
    }

    public function includeproductsCategories(Categories $category)
    {
        return $this->collection($category->products, new ProductsTransformer());
    }
}
