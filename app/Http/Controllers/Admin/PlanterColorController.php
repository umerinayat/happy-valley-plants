<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PlanterColor;
use App\Repositories\Contracts\IPlanterColor;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use App\Http\Resources\PlanterColorResource;

class PlanterColorController extends Controller
{

    protected $planterColors;

    // constructor
    public function __construct(IPlanterColor $planterColors) 
    {
        $this->planterColors = $planterColors;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planterColors = $this->planterColors->withCriteria([
            new LatestFirst()
        ])
        ->all();
        return PlanterColorResource::collection($planterColors);
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
    public function store(\App\Http\Requests\PlanterColor\Store $request)
    {
        $planterColor = $this->planterColors->create($request->all());
        return new PlanterColorResource( $planterColor );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanterColor  $planterColor
     * @return \Illuminate\Http\Response
     */
    public function show(PlanterColor $planterColor)
    {
        return new PlanterColorResource( $planterColor );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanterColor  $planterColor
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanterColor $planterColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanterColor  $planterColor
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\PlanterColor\Update $request, PlanterColor $planterColor)
    {
        $planterColor = $this->planterColors->update($planterColor->id, $request->all());
        return new PlanterColorResource( $planterColor );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanterColor  $planterColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanterColor $planterColor)
    {
        if ($this->planterColors->delete($planterColor->id))
        {
            return ['message' => 'Planter Color Deleted!'];
        }
    }
}
