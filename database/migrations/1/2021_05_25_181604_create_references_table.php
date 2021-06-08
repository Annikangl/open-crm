<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser')->nullable();
            $table->text('FIO')->nullable();
            $table->text('email')->nullable();
            $table->string('telephone')->nullable();
            $table->text('prichinaObr')->nullable();
            $table->text('textObr')->nullable();
            $table->integer('idPodr')->nullable();
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
        Schema::dropIfExists('references');
    }
}
