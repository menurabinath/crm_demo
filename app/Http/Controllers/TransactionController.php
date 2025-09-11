<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // For now, just show a blank page or a simple message
        return view('transactions.index');
    }
}
