<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
