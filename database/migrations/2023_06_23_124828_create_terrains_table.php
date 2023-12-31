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

        Schema::create('terrains', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nom");
            $table->string("espace");
            $table->string("prix");
            $table->string("adresse");
            $table->string("description");
            $table->integer("user_id");
            $table->string("numero_proprietaire");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};
