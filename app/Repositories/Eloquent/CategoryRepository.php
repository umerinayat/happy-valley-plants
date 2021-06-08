<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\ICategory;

class CategoryRepository extends BaseRepository implements ICategory
{
    public function model()
    {
        return Category::class;
    }

    public function allWithSubCategories()
    {
        return $this->model->with(['parentCategory', 'subCategories'])
            ->orderBy('id', 'DESC')
            ->get();
    } 

    public function categoriesTree()
    {
        return $this->model->with('childrenRecursive')->where('parent_cat_id', 0)->get();
    }
}