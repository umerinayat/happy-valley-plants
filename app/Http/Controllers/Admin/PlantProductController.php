<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PlantProduct;
use App\Repositories\Contracts\IPlantProduct;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use App\Http\Resources\PlantProductResource;


class PlantProductController extends Controller
{

    protected $plantProducts;

    // constructor
    public function __construct(IPlantProduct $plantProducts) 
    {
        $this->plantProducts = $plantProducts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantProducts = $this->plantProducts->withCriteria([
            new LatestFirst()
        ])
        ->all();
        return PlantProductResource::collection($plantProducts);
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
    public function store(\App\Http\Requests\PlantProduct\Store $request)
    {
        $plantProduct = $this->plantProducts->create($request->all());
        return new PlantProductResource( $plantProduct );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantProduct  $plantProduct
     * @return \Illuminate\Http\Response
     */
    public function show(PlantProduct $plantProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantProduct  $plantProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantProduct $plantProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantProduct  $plantProduct
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\PlantProduct\Update $request, PlantProduct $plantProduct)
    {
        $plantProduct = $this->plantProducts->update($plantProduct->id, $request->all());
        return new PlantProductResource( $plantProduct );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantProduct  $plantProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantProduct $plantProduct)
    {
        //
    }
}
