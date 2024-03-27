<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_number' , 'invoice_status', 'value_invoice_status', 'request_type', 'category', 'device', 'invoice_date', 'payment_date', 'price', 'discount', 'transport', 'total', 'confirm_number', 'request_id'] ;

    public function client_request(){
        return $this->belongsTo(ClientsRequest::class , 'request_id' , 'id');
    }
}
