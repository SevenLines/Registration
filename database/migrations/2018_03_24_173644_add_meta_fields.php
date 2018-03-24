<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("services", function (Blueprint $table) {
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();
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
            $table->dropColumn("meta_description");
            $table->dropColumn("meta_keywords");
        });
    }
}
