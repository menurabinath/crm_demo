@component('mail::message')
# Invoice #{{ $invoice->id }}

Hello {{ $invoice->customer->name }},

You have received a new invoice.

**Amount:** ${{ $invoice->amount }}
**Status:** {{ ucfirst($invoice->status) }}

@component('mail::button', ['url' => route('invoices.show', $invoice->id)])
View Invoice
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
