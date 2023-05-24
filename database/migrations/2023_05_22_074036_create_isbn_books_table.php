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
        Schema::create('isbn_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('isbn')->nullable();
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->string('price')->nullable();
            $table->string('publisher')->nullable();
            $table->string('contributor')->nullable();
            $table->bigInteger('publishing_date')->nullable();
            $table->string('form')->nullable();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isbn_books');
    }
};
