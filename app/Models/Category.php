<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable =[
    'name' ,
    'slug' ,
    'description' ,
    'status' ,
    'popular' ,
    'image' ,
    'meta_title' ,
    'meta_descripion',
    'meta_keyword' ,
    ];
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
