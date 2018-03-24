<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisibleToService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("services", function (Blueprint $table) {
            $table->boolean("visible")->default(true);
            $table->integer("order")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("services", function (Blueprint $table) {
            $table->removeColumn("visible");
            $table->removeColumn("order");
        });
    }
}
