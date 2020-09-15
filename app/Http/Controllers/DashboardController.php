<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $income = Transaction::where('status', 'SUCCESS')->sum('total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'desc')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('status', 'PENDING')->count(),
            'success' => Transaction::where('status', 'SUCCESS')->count(),
            'failed' => Transaction::where('status', 'FAILED')->count()
        ];

        $data = [
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie
        ];

        return view('pages.dashboard', $data);
    }
}
