<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $invoices = Invoice::with(['customer', 'proposal'])->get();
            return view('invoices.index', compact('invoices'));
}
    public function create()
    {
        $customers = \App\Models\Customer::all();
        $proposals = \App\Models\Proposal::all();
        return view('invoices.create', compact('customers', 'proposals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'proposal_id' => 'nullable|exists:proposals,id',
            'amount'      => 'required|numeric|min:0',
            'status'      => 'required|in:pending,paid,failed',
        ]);

        $invoice = Invoice::create($request->only([
            'customer_id',
            'proposal_id',
            'amount',
            'status',
        ]));

        // Send email to the customer
        Mail::to($invoice->customer->email)->send(new InvoiceMail($invoice));

        return redirect()->route('invoices.index')->with('success', 'Invoice created and email sent!');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = \App\Models\Invoice::with(['customer', 'proposal'])->findOrFail($id);
        $customers = \App\Models\Customer::all();
        $proposals = \App\Models\Proposal::all();
        return view('invoices.edit', compact('invoice', 'customers', 'proposals'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'proposal_id' => 'nullable|exists:proposals,id',
            'amount'      => 'required|numeric|min:0',
            'status'      => 'required|in:pending,paid,failed',
        ]);
        $invoice = \App\Models\Invoice::findOrFail($id);
        $invoice->update($request->only([
            'customer_id',
            'proposal_id',
            'amount',
            'status',
        ]));
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(string $id)
    {
        $invoice = \App\Models\Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
