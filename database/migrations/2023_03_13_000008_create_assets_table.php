<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_number')->nullable();
            $table->string('name')->nullable();
            $table->string('register')->nullable();
            $table->string('merk')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('bahan')->nullable();
            $table->string('pemebelian')->nullable();
            $table->string('perolehan')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->string('sub_lokasi')->nullable();
            $table->string('lantai')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->longText('notes')->nullable();
            $table->string('perintah')->nullable();
            $table->string('disposisi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}