<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desing_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('design_id');
            $table->foreign('design_id')->references('id')->on('designs');
            $table->unsignedBigInteger('content_type_id');
            $table->foreign('content_type_id')->references('id')->on('content_types');
            $table->string('image', 1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desing_details');
    }
}
