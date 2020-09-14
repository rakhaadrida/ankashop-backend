<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "product";
    protected $fillable = ['id', 'name', 'slug', 'type', 'description', 'price', 'quantity'];

    public function gallery() {
        return $this->hasMany('App\Models\Gallery', 'product_id', 'id');
    }
}
