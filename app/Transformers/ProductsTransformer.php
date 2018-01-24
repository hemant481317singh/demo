<?php

namespace App\Transformers;

use App\Models\Producttypes;
use League\Fractal;
use App\Models\Products;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class ProductsTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = ['category','producttype'];

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
    public function transform(Products $products)
    {
        return [

            'id' => $products->id,
            'code' => $products->code,
            'category_id' => $products->category_id,
            'producttype_id' => $products->producttype_id,
            'image' => $products->image,
            'height' => $products->height,
            'height_unit' => $products->height_unit,
            'width' => $products->width,
            'width_unit' => $products->width_unit,
            'colour' => $products->colour,
            'series' => $products->series,
            'application' => $products->application,
            'finish' => $products->finish,
            'body' => $products->body,
            'frontresistant' => $products->frontresistant,
            'pei' => $products->pei,
            'mohs' => $products->mohs,
            'cof' => $products->cof,
            'dcof' => $products->dcof,
            'thickness' => $products->thickness,
            'price' => $products->price,
            'pricesqft' => $products->pricesqft,
            'conversion' => $products->conversion,
            'pieces' => $products->pieces,
            'weight_piece' => $products->weight_piece,
            'weight_box' => $products->weight_box,
            'box_pallet' => $products->box_pallet,
            'pieces_pallet' => $products->pieces_pallet,
            'status' => $products->status,
            'created_at' => $products->created_at->format('d M Y'),
            'updated_at' => $products->updated_at->format('d M Y'),
        ];
    }

    public function includecategoryProducts(Products $products)
    {
            return $this->item($products->category, new CategoriesTransformer());
    }
    public function includeproducttypesProducts(Products $products)
    {
        return $this->item($products->producttype, new ProducttypesTransformer());
    }
}
