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
        Schema::create('professeurs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur');
            $table->enum('genre', ['Masculin', 'Feminin']);
            $table->string('adresse');
            $table->date('date_naissance');
            $table->string('telephone');
            $table->string('whatsapp');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('id_utilisateur')
                ->references('id')->on('utilisateurs')
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
        Schema::dropIfExists('professeurs');
    }
};
