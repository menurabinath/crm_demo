<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $proposals = Proposal::with('customer')->get();
            return view('proposals.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = \App\Models\Customer::all();
        return view('proposals.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title'       => 'required|string|max:255',
            'details'     => 'nullable|string',
            'status'      => 'required|in:draft,approved,rejected',
        ]);

       Proposal::create([
            'customer_id' => $request->customer_id,
            'title'       => $request->title,
            'details'     => $request->details,
            'status'      => $request->status,
        ]);
        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $proposal = \App\Models\Proposal::with('customer')->findOrFail($id);
        $customers = \App\Models\Customer::all();
        return view('proposals.edit', compact('proposal', 'customers'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title'       => 'required|string|max:255',
            'details'     => 'nullable|string',
            'status'      => 'required|in:draft,approved,rejected',
        ]);
        $proposal = \App\Models\Proposal::findOrFail($id);
        $proposal->update($request->only([
            'customer_id',
            'title',
            'details',
            'status',
        ]));
        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully.');
    }

    public function destroy(string $id)
    {
        $proposal = \App\Models\Proposal::findOrFail($id);
        $proposal->delete();
        return redirect()->route('proposals.index')->with('success', 'Proposal deleted successfully.');
    }
}
