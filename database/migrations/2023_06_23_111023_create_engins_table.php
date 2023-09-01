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
            Schema::create('engin', function (Blueprint $table) {
                $table->increments("id");
                $table->string("nom");
                $table->string("prix");
                $table->string("adresse_mail");
                $table->string("disponibilité");
                $table->string("description");
                $table->string("localisation");
                $table->timestamps();
            });
        }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engins');
    }
};
