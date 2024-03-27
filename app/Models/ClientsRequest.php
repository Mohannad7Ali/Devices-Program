<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsRequest extends Model
{
    use HasFactory;
    protected $fillable = ['client_name','phone','location','status','request_type' , 'value_type' , 'category' , 'device' ,'device_id' , 'price' ,'date' , 'time' , 'appointment_accept'];
        /**
         * Get the user associated with the ClientsRequest
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function invoice()
        {
            return $this->hasOne(Invoice::class, 'request_id', 'id');
        }
    }
