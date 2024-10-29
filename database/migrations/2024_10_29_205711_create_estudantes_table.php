<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudante', function (Blueprint $table) {
            $table->id();
            $table->string('numerEstudante')->unique();
            $table->string('nome');
            $table->string('BI')->unique();
            $table->string('faculdade');
            $table->string('curso');
            $table->string('dataInicio');
            $table->string('dataFim');
            $table->decimal('mediasCadeiras',5,2);
            $table->decimal('mediaGlobal',5,2);
            $table->string('nomeReitor');
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
        Schema::dropIfExists('estudantes');
    }
}
