<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gadais', function (Blueprint $table) {
            $table->id();
            $table->enum('paket', ['1', '2', '3']);
            $table->string('ktp');
            $table->string('jaminan');
            $table->string('keterangan');
            $table->enum('status', ['process', 'gadai', 'lunas'])->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('gadais');
    }
}
