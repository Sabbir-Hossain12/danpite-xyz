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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('aboutUs_title1')->nullable();
            $table->string('aboutUs_title2')->nullable();
            $table->text('aboutUs_desc')->nullable();
            
            $table->text('aboutUs_projectCompleted_img')->nullable();
            $table->string('aboutUs_projectCompleted_title')->nullable();
            $table->string('aboutUs_projectCompleted_count')->nullable();
            
            $table->text('aboutUs_happyClients_img')->nullable();
            $table->string('aboutUs_happyClients_title')->nullable();
            $table->string('aboutUs_happyClients_count')->nullable();
            
            $table->text('aboutUs_teamMembers_img')->nullable();
            $table->string('aboutUs_teamMembers_title')->nullable();
            $table->string('aboutUs_teamMembers_count')->nullable();
            
            $table->text(  'aboutUs_yearsService_img')->nullable();
            $table->string('aboutUs_yearsService_title')->nullable();
            $table->string('aboutUs_yearsService_count')->nullable();
            
            $table->text('aboutUs_sideImg')->nullable();
            
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
        Schema::dropIfExists('about_us');
    }
};
