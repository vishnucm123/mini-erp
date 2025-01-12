<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['customer_id', 'date', 'amount', 'status','invoice_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $invoice->invoice_id = 'INV-' . strtoupper(uniqid());
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
