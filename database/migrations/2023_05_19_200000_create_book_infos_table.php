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
    Schema::create('book_infos', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained();
      $table->bigInteger('isbn')->nullable();
      $table->string('title');
      $table->string('img')->nullable();
      $table->bigInteger('price')->nullable();
      $table->string('publisher')->nullable();
      $table->string('contributor')->nullable();
      $table->bigInteger('publishing_date')->nullable();
      $table->string('product_form')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('book_infos');
  }
};
