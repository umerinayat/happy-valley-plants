<?php

namespace App\Repositories\Eloquent;

use App\Models\PlanterColor;
use App\Repositories\Contracts\IPlanterColor;

class PlanterColorRepository  extends BaseRepository implements IPlanterColor
{
    public function model()
    {
        return PlanterColor::class;
    }
}