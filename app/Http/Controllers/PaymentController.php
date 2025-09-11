<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;


class PaymentController extends Controller
{
    public function checkout(Invoice $invoice)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = CheckoutSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $invoice->amount * 100,
                    'product_data' => ['name' => 'Invoice #' . $invoice->id],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('invoice.success', $invoice->id),
            'cancel_url' => route('invoices.index'),
        ]);

        return redirect($session->url);
    }

    public function success(Invoice $invoice)
    {
        $invoice->update([
            'status' => 'paid',
            'stripe_status' => 'succeeded',
        ]);

        return redirect()->route('invoices.index')->with('success', 'Payment successful!');
    }
}
