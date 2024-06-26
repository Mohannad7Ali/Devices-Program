<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients_requests', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('phone');
            $table->string('location');
            $table->string('request_type');
            $table->integer('Request_type_value')->enum([0 , 1 ]);
            $table->string('device_id');
            $table->string('category')->nullable();
            $table->string('device')->nullable();
            $table->decimal('price' , 8 , 2)->nullable() ;
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->boolean('client_accept')->default(0);
            $table->boolean('request_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_requests');
    }
};
