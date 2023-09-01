<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendz_vouses', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("client_id");
            $table->integer("bureau_id");
            $table->date("date");
            $table->string("heure");
            $table->timestamps();
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");
            $table->foreign("bureau_id")->references("id")->on("bureau_d_etudes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rdvs');
    }
};