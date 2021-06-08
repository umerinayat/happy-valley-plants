<?php

namespace App\Repositories\Eloquent;

use App\Models\PlanterStyle;
use App\Repositories\Contracts\IPlanterStyle;

class PlanterStyleRepository extends BaseRepository implements IPlanterStyle
{
    public function model()
    {
        return PlanterStyle::class;
    }
}