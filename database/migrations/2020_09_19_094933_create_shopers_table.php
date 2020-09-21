<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owner_name');
            $table->string('email');
            $table->string('shop_name');
            $table->string('mobile');
            $table->string('password');
            $table->text('nid_image');
            $table->string('state');
            $table->string('city');
            $table->text('address');
            $table->text('service_brief');
            $table->string('service_provide');
            $table->string('level');
            $table->string('varification_code');
            $table->tinyInteger('is_varified')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('shopers');
    }
}
