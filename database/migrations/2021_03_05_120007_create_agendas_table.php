<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('judul');
            $table->integer('tipe'); // 1 = mentoring, 2 = general, 3 = talaqi, 4 = tugas besar
            $table->integer('status'); // 1 = mentoring, 2 = general, 3 = talaqi, 4 = tugas besar
            $table->dateTime('tanggal_akhir');
            // for general & talaqi only
            $table->string('materi')->nullable();
            $table->string('tempat')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
