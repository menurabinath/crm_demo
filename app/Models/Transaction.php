<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'amount', 'status'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
