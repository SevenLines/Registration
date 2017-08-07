<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLegalToQuery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("queries", function (Blueprint $table) {
            $table->integer("legal_id")->unsigned()->nullable();
            $table->foreign("legal_id")->references("id")->on("clients");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("queries", function (Blueprint $table) {
            $table->dropColumn("legal_id");
        });
    }
}
