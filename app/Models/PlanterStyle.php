<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanterStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'owner_id')->where('type', 'planter');
    }
}
