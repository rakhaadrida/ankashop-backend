<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $table = "product_gallery";
    protected $fillable = ['id', 'product_id', 'photo', 'is_default'];

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function getPhotoAttribute($value) {
        return url('/storage/' . $value);
    }
}
