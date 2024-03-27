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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number',50);
            $table->string('invoice_status',50);
            $table->integer('value_invoice_status');
            $table->string('request_type',50);
            $table->string('category',50);
            $table->string('device',50);
            $table->date('invoice_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->decimal('price',8,2);
            $table->decimal('discount',8,2)->nullable();// الحسم
            $table->decimal('transport',8,2);
            $table->decimal('total',8,2);
            $table->string('confirm_number')->nullable();
            $table->foreignId('request_id')->references('id')->on('clients_requests')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
