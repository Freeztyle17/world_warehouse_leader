<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('warehouse_districts');
            $table->foreignId('zone_id')->constrained('warehouse_zones');
            $table->foreignId('warehouse_id')->constrained('warehouses');
            $table->foreignId('section_id')->constrained('sections');
            $table->date('start_date_of_reservation');
            $table->date('end_date_of_reservation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
