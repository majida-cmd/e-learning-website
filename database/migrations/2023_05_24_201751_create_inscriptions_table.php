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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_etudiant');
            $table->date('date_inscription');
            $table->foreignId('id_module')->constrained('modules')->onDelete('cascade');
            $table->foreignId('id_tarif')->constrained('tarifs')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('id_etudiant')
            ->references('id_utilisateur')->on('etudiants')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
};
