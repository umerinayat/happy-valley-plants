<?php

namespace App\Repositories\Eloquent;

use App\Models\PlanterSize;
use App\Repositories\Contracts\IPlanterSize;

class PlanterSizeRepository  extends BaseRepository implements IPlanterSize
{
    public function model()
    {
        return PlanterSize::class;
    }
}