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
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('cost_price', 15, 2); // Move this line up
            $table->decimal('sale_price', 15, 2); // Move this line up
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_parts');
    }
};


            // $table->string('name');
            // $table->decimal('price', 15, 2);
            // $table->integer('quantity');
            // $table->timestamps();

            // $table->decimal('cost_price', 15, 2)->after('price');
            // $table->decimal('sale_price', 15, 2)->after('cost_price');
