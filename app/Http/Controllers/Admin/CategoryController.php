<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\ICategory;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\LatestFirst;

class CategoryController extends Controller
{
    protected $categories;

    // constructor
    public function __construct(ICategory $categories) 
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories
        ->withCriteria([
            new LatestFirst(),
            new EagerLoad(['parentCategory', 'subCategories'])
        ])
        ->all();
        
        return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Category\Store $request)
    {
        $category = $this->categories->create($request->all());
        return new CategoryResource( $category );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource( $category );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Category\Update $request, Category $category)
    {
        $category = $this->categories->update($category->id, $request->all());
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        if (count($category->subCategories) > 0) {
            return ['message' => 'First delete the child categories!'];
        }

       if ($this->categories->delete($category->id))
       {
        return ['message' => 'Category Deleted!'];
       }
    }
}
