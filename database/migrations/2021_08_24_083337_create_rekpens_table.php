<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekpensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekpens', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nominal');
            $table->enum('status', ['bayar', 'tertahan', 'selesai']);
            $table->string('token');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('rekpens');
    }
}
