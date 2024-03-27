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
            'category' => 'مكيفات',
            'device' => ' جداري مكيف',
            'request_type' => 'طلب صيانة',
        ]);
        \App\Models\ClientsRequest::create([
            'client_name' => 'Roaa mostafa',
            'location' => 'syria',
            'phone' => '0980663670',
            'category' => 'مكيفات',
            'device' => ' جداري مكيف',
            'request_type' => 'طلب صيانة',
        ]);
    }
}
