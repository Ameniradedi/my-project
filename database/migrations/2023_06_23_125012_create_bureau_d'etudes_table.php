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
        Schema::create('bureau_d_etudes', function (Blueprint $table) {
        $table->increments("id");
        $table->string("nom");
        $table->string("adresse");
        $table->string("adresse_mail");
        $table->string("rendez_vous");
        $table->string("tel");
        $table->string("num tel");
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_d_etudes');
    }
};
