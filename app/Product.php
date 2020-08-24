<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tag()
    {
        return $this->
        belongsToMany(Tag::class,'product_tags','product_id','tag_id')
            ->withTimestamps();
    }
    public function category ()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function productRelateds()
    {
        return $this->hasMany(Product::class,'category_id');
    }


}
