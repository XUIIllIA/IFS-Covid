<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viruses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rw')->constrained('rws')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('positif');
            $table->integer('sembuh');
            $table->integer('meninggal');
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
        Schema::dropIfExists('viruses');
    }
}
