<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLegalClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('legal_client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("legal_id")->unsigned();
            $table->integer("client_id")->unsigned();
            $table->foreign("legal_id")->references("id")->on("clients");
            $table->foreign("client_id")->references("id")->on("clients");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('legal_client');
    }
}
