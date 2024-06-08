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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            // $table->foreignId('payment_method_id')->constrained()->onDelete('cascade');
            // $table->foreignId('repair_status_id')->constrained()->onDelete('cascade');
            // $table->string('description');
            // $table->integer('quantity');
            // $table->decimal('unit_price', 15, 2)->default(0);
            // $table->decimal('total', 15, 2)->default(0);
            // $table->decimal('discount', 15, 2)->default(0); // Move this line up
            // $table->decimal('tax', 15, 2)->default(0);      // Move this line up
            // $table->decimal('grand_total', 15, 2)->default(0);

            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->string('description');
            $table->integer('quantity');
            $table->decimal('unit_price', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};


            // $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            // $table->foreignId('payment_method_id')->constrained()->onDelete('cascade');
            // $table->foreignId('repair_status_id')->constrained()->onDelete('cascade');
            // $table->string('description');
            // $table->integer('quantity');
            // $table->decimal('unit_price', 15, 2);
            // $table->decimal('total', 15, 2);
            // $table->decimal('discount', 15, 2)->default(0)->after('total');
            // $table->decimal('tax', 15, 2)->default(0)->after('discount');
            // $table->decimal('grand_total', 15, 2)->after('tax');
