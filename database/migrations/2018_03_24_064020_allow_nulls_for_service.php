<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullsForService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("services", function (Blueprint $table) {
            $table->text('description')->nullable()->default("")->change();
        });
        Schema::table("sub_services", function (Blueprint $table) {
            $table->text('documents')->nullable()->default("")->change();
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
            $table->text('description')->nullable(false)->change();
        });
        Schema::table("sub_services", function (Blueprint $table) {
            $table->text('documents')->nullable(false)->change();
        });
    }
}
