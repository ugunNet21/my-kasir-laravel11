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
            // $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            // $table->foreignId('payment_method_id')->constrained()->onDelete('cascade');
            // $table->foreignId('repair_status_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('repair_status_id');
            $table->date('date');
            $table->string('status')->nullable();
            $table->decimal('total', 15, 2)->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('tax', 15, 2)->default(0);
            $table->decimal('grand_total', 15, 2)->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('repair_status_id')->references('id')->on('repair_statuses')->onDelete('cascade');
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
