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
<<<<<<< HEAD:database/migrations/2021_05_25_182337_create_podrazdels_table.php
            $table->integer('idOrganMinusta')->nullable();
            $table->integer('idTerritorial')->nullable();
            $table->integer('idNotarial')->nullable();
=======
            $table->integer('idOrganMinusta');
            $table->integer('idTerritorial');
            $table->integer('idNotarial');
>>>>>>> eb93d0d7798a7299897546954b37f64bf923e5c7:database/1/2021_05_25_182337_create_podrazdels_table.php
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
