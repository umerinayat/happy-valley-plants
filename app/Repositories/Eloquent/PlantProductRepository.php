<?php

namespace App\Repositories\Eloquent;

use App\Models\PlantProduct;
use App\Repositories\Contracts\IPlantProduct;

class PlantProductRepository  extends BaseRepository implements IPlantProduct
{
    public function model()
    {
        return PlantProduct::class;
    }

    public function getCategoryProducts($category_slug)
    {
        return $this->model->whereHas('category', function($q) use ($category_slug) {
                $q->where('slug', $category_slug);
            })
            ->with('category')
            ->get();
    }

    public function getProductDetail($product_slug)
    {
        return $this->model->whereSlug($product_slug)
            ->with('category')
            ->get();
    }
}