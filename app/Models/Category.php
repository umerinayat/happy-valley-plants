<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_cat_id'
    ];

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_cat_id'); 
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id'); 
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_cat_id');
    }

    // recursive, loads all descendants
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products()
    {
        return $this->hasMany(PlantProduct::class);
    }
}
