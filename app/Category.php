<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Product;

class Category extends Model
{
    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function scopeGetParent($query){
        return $query->whereNull('parent_id');
    }

    protected $fillable = ['name', 'parent_id', 'slug'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getNameAttributes($value){
        return ucfirst($value);
    }

    public function child(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
