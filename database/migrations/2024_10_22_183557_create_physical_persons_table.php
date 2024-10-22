<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_persons', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->date('birth_date');
            $table->string('passport_series');
            $table->string('passport_number');
            $table->string('inn');
            $table->string('snils');
            $table->string('phone')->unique();
            $table->string('email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physical_persons');
    }
}
