<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIthingsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ithings_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('photo')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('size')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('ithings_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ithings_products');
    }
}
