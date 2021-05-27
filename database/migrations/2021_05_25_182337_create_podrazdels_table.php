<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodrazdelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podrazdels', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idOrganMinusta')->nullable();
            $table->integer('idTerritorial')->nullable();
            $table->integer('idNotarial')->nullable();
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
        Schema::dropIfExists('podrazdels');
    }
}
