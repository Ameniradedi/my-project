<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("bureau_d_etude_id");
            $table->integer("user_id");
            $table->string("date_et_heure");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("bureau_d_etude_id")->references("id")->on("bureau_d_etudes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdvs');
    }
};
