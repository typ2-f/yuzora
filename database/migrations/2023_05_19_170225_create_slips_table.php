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
        Schema::create('slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained();
            $table->bigInteger('isbn');
            $table->bigInteger('purchase_date');
            $table->bigInteger('purchase_price');
            $table->bigInteger('selling_date');
            $table->bigInteger('selling_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slips');
    }
};
