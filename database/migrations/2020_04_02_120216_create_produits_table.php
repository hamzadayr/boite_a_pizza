<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('prix');
            $table->unsignedInteger('catID');
            $table->foreign('catID')->references('id')->on('catproduits')->onDelete('cascade');
            $table->integer('remise');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('isPromo');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
