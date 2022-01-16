<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTag extends Migration
{
  public function up()
  {
    Schema::dropIfExists('product_tag');
    Schema::create('product_tag', function (Blueprint $table) {
      $table->unsignedBigInteger('product_id');
      $table->unsignedBigInteger('tag_id');
      $table->foreign('product_id')->references('id')->on('product');
      $table->foreign('tag_id')->references('id')->on('tag');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('product_tag');
  }
}