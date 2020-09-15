<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Transaction::All();
        $data = [
            'items' => $items
        ];

        return view('pages.transaction.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $item = Transaction::with(['detail.product'])->findOrFail($id);
        $data = [
            'item' => $item
        ];

        return view('pages.transaction.show', $data);
    }

    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        $data = [
            'item' => $item
        ];

        return view('pages.transaction.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }

    public function status(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $item = Transaction::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return redirect()->route('transaction.index');
    }
}
