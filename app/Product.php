<?php

namespace App;

use App\Image;
use App\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Product extends Model
{

    //
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsToMany("App\Category", 'category_product');
    }

    public function images() {
    	return $this->hasMany('App\ProductImage');
    }

    public function thumbnailPath() {
        return urldecode('/images/products_images/'.$this->id.'/'.$this->thumbnail);
    }

    public function categoriesAscending() {
        return $this->categories()->orderBy('created_at', 'asc')->get();
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
             $product->images()->delete();
               File::deleteDirectory(public_path('images/products_images/'.$product->id));
       
             // do the rest of the cleanup...
        });
    }
}
