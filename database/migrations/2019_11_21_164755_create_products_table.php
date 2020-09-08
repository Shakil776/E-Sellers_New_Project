<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('manufacturer_id');
            $table->integer('vendor_id')->default(0);
            $table->string('product_name');
            $table->float('product_price', 10,2);
            $table->float('rating', 10,2)->default(0);
            $table->integer('rating_count')->default(0);
            $table->string('product_code');
            $table->integer('status_id');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('product_image');
            $table->tinyInteger('publication_status');
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
}
