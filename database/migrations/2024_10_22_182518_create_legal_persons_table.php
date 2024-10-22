<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_persons', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('client_full_name');
            $table->string('client_short_name');
            $table->string('inn');
            $table->string('kpp');
            $table->string('ogrn');
            $table->foreignId('delegate_id')->constrained('physical_persons')->onDelete('cascade');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('address');
            $table->string('status');
            $table->foreignId('okved_code_id')->constrained('okved_codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_persons');
    }
}
