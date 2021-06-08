<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\PlanterStyle;
use App\Http\Resources\PlanterStyleResource;
use App\Repositories\Contracts\IPlanterStyle;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\LatestFirst;

use App\Repositories\Contracts\IImage;


class PlanterStyleController extends Controller
{

    protected $planterStyles;
    protected $images;

    // constructor
    public function __construct(IPlanterStyle $planterStyles, IImage $images) 
    {
        $this->planterStyles = $planterStyles;
        $this->images = $images;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planterStyles = $this->planterStyles->withCriteria([
            new LatestFirst(),
            new EagerLoad(['image'])
        ])
        ->all();
        return PlanterStyleResource::collection($planterStyles);
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
    public function store(\App\Http\Requests\PlanterStyle\Store $request)
    {   
        // Save Planter
        $planterStyle = $this->planterStyles->create($request->all());

        // Save Planter Image
        $path = Storage::putFileAs(
            'uploads/planter-styles', 
            $request->file('planter_image'),
            Str::slug($planterStyle->name, '-') . '-' . $planterStyle->id . '.' . $request->file('planter_image')->extension()
        );

        $url = Storage::url($path);

        $planterImage = $this->images->create([
            'owner_id' => $planterStyle->id,
            'type' => 'planter',
            'image_path' => $url 
        ]);

        return new PlanterStyleResource( $planterStyle );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanterStyle  $planterStyle
     * @return \Illuminate\Http\Response
     */
    public function show(PlanterStyle $planterStyle)
    {
        return new PlanterStyleResource( $planterStyle );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanterStyle  $planterStyle
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanterStyle $planterStyle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanterStyle  $planterStyle
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\PlanterStyle\Update $request, PlanterStyle $planterStyle)
    {
        $planterStyle = $this->planterStyles->update($planterStyle->id, $request->all());
        return new PlanterStyleResource( $planterStyle );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanterStyle  $planterStyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanterStyle $planterStyle)
    {
       if ($this->planterStyles->delete($planterStyle->id))
       {
        return ['message' => 'Planter Style Deleted!'];
       }
    }
}
