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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //titre
            $table->longText('description'); //description
            $table->integer('surface'); //surface
            $table->integer('rooms'); //chambre
            $table->integer('bedrooms'); //nbre de pieces totale
            $table->integer('floor'); //l'etage
            $table->integer('price'); //prix
            $table->string('city'); //ville
            $table->string('address'); //adresse
            $table->string('postal_code'); //code postal
            $table->boolean('sold'); //si la chambre a été vendue ou pas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
