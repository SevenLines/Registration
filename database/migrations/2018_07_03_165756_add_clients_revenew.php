<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientsRevenew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("clients", function (Blueprint $table) {
            $table->decimal("expenses")->default(0);
            $table->decimal("profit")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("clients", function (Blueprint $table) {
            $table->dropColumn("expenses");
            $table->dropColumn("profit");
        });
    }
}
