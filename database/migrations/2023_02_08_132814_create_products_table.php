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
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->bigInteger('categories_id');
            $table->string('text_btn');
            $table->string('image1');
            $table->double('price');
            $table->double('sale_price')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('added_by');
            $table->integer('come_code');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('active');
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
        Schema::dropIfExists('products');
    }
};
