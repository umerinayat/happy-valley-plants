<?php

namespace App\Repositories\Eloquent;

use App\Models\Image;
use App\Repositories\Contracts\IImage;

class ImageRepository extends BaseRepository implements IImage
{
    public function model()
    {
        return Image::class;
    }
}