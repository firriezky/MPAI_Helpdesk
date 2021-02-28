<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ticket_id")->unique();
            $table->string("name");
            $table->string("nid");
            $table->string("class")->nullable();
            $table->string("faculty")->nullable();
            $table->string("account_type")->nullable();
            $table->string("ticket_type")->nullable();
            $table->string("ticket_detail")->nullable();
            $table->string("answers_pref");
            $table->string("answers_ticket")->nullable();
            $table->string("status");
            $table->string("file")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
