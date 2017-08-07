<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legal_client', function (Blueprint $table) {
            $table->foreign("legal_id")->references("id")->on("clients")->onDelete("cascade");
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legal_client', function (Blueprint $table) {
            $table->dropForeign("legal_client_client_id_foreign");
            $table->dropForeign("legal_client_legal_id_foreign");
        });
    }
}
