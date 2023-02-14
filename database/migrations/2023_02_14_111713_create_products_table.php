<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seller_id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('quantity')->nullable();
            $table->unsignedBigInteger('view_count');
            $table->unsignedBigInteger('category_id');
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->integer('regency')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
