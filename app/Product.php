<?php

namespace App;

use App\Category;
use App\Image;
use App\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{

    //
    use SoftDeletes;
    use SearchableTrait;


    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsToMany("App\Category", 'category_product')->select(array('title', 'description'));
    }

    public function categoriesTitle () {
        return $this->belongsToMany(Category::class)->select(array('title'));
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
