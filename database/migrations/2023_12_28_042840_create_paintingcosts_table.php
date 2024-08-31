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
        Schema::create('paintingcosts', function (Blueprint $table) {
            $table->id();
            $table->integer('paintingtype_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('longdescription')->nullable();
            $table->integer('price');
            $table->text('image')->nullable();
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('paintingcosts');
    }
};
