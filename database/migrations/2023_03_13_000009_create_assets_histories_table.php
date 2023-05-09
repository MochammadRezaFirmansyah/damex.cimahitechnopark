<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('assets_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('perintah')->nullable();
            $table->string('disposisi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets_histories');
    }
}