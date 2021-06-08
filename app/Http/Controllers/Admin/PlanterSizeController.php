<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanterSize;
use Illuminate\Http\Request;

use App\Repositories\Contracts\IPlanterSize;
use App\Http\Resources\PlanterSizeResource;
use App\Repositories\Eloquent\Criteria\LatestFirst;

class PlanterSizeController extends Controller
{

    protected $planterSizes;

    // constructor
    public function __construct(IPlanterSize $planterSizes) 
    {
        $this->planterSizes = $planterSizes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planterSizes = $this->planterSizes->withCriteria([
            new LatestFirst()
        ])
        ->all();
        return PlanterSizeResource::collection($planterSizes);
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
    public function store(\App\Http\Requests\PlanterSize\Store $request)
    {
        $planterSize = $this->planterSizes->create($request->all());
        return new PlanterSizeResource( $planterSize );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanterSize  $planterSize
     * @return \Illuminate\Http\Response
     */
    public function show(PlanterSize $planterSize)
    {
        return new PlanterSizeResource( $planterSize );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanterSize  $planterSize
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanterSize $planterSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanterSize  $planterSize
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\PlanterSize\Update $request, PlanterSize $planterSize)
    {
        $planterSize = $this->planterSizes->update($planterSize->id, $request->all());
        return new PlanterSizeResource( $planterSize );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanterSize  $planterSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanterSize $planterSize)
    {
        if ($this->planterSizes->delete($planterSize->id))
        {
            return ['message' => 'Planter Size Deleted!'];
        }
    }
}
