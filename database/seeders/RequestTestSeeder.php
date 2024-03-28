<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients_requests')->delete();
        \App\Models\ClientsRequest::create([
            'client_name' => 'Mohannad Ali',
            'location' => 'syria',
            'phone' => '0980663670',
            'request_type'=>'صيانة' ,
            'value_type'=> 2 ,
            'device_id' => '1',
            'price' => 0,
            'appointment_accept'    => '1' ,
            'status'    => false,
            'category' => 'مكيفات',
            'device' => ' جداري مكيف',
            'request_type' => 'طلب صيانة',
        ]);
        \App\Models\ClientsRequest::create([
            'client_name' => 'any thing',
            'location' => 'syria',
            'phone' => '0980663670',
            'request_type'=>'صيانة' ,
            'value_type'=> 2 ,
            'device_id' => '1',
            'price' => 0,
            'appointment_accept'    => '1' ,
            'status'    => false,
            'category' => 'مكيفات',
            'device' => ' جداري مكيف',
            'request_type' => 'طلب صيانة',
        ]);

    }
}
