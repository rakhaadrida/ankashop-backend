<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetails extends Model
{
    use SoftDeletes;

    protected $table = "trans_detail";
    protected $fillable = ['transaction_id', 'product_id'];

    public function transaction() {
        return $this->belongsTo('App\Models\Transaction', 'transaction_id', 'id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
