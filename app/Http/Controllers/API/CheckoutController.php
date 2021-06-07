<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetails;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request) {
        $data = $request->except('trans_detail');
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100,999);

        $transaction = Transaction::create($data);

        foreach($request->trans_detail as $product) {
            $detail[] = new TransactionDetails([
                'transaction_id' => $transaction->id,
                'product_id' => $product
            ]);

            // Product::find($product)->decrement('quantity');
        }

        $transaction->detail()->saveMany($detail);

        return ResponseFormatter::success($transaction);
    }
}
