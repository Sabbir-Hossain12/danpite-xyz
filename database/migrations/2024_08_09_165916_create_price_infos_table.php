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
        Schema::create('price_infos', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title');
            $table->string('pricing_info_title');
            $table->text('pricing_info_description');
            $table->text('pricing_info_img');
            
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
        Schema::dropIfExists('price_infos');
    }
};
