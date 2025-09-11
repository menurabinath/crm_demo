<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        // Eager load related invoice and customer
        $transactions = Transaction::with('invoice.customer')->get();

        return view('transactions.index', compact('transactions'));
    }
}
