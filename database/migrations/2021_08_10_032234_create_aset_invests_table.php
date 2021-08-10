<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_invests', function (Blueprint $table) {
            $table->id();
            $table->string('invest');
            $table->string('management');
            $table->string('custodian');
            $table->string('type');
            $table->string('perusahaan_id');
            $table->unsignedBigInteger('invest_id');
            $table->foreign('invest_id')->references('id')->on('investasis')->onDelete('cascade');
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
        Schema::dropIfExists('aset_invests');
    }
}
