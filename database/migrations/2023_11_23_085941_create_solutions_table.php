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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('solution_title');
            $table->text('solution_text')->nullable();
            $table->string('solution_btn_name')->nullable();
            $table->text('solution_btn_link')->nullable();
            $table->string('slug')->unique();
            $table->text('solution_image')->nullable();
            $table->text('solution_bg_image')->nullable();
            $table->string('desc_title')->nullable();
            $table->text('desc_text')->nullable();
            $table->text('desc_image')->nullable();
            $table->text('bg_img')->nullable();
            $table->string('img_position_type')->default('left');
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
        Schema::dropIfExists('solutions');
    }
};
