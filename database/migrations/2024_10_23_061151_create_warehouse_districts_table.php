<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_districts', function (Blueprint $table) {
            $table->id();
            $table->integer('district_number');
            $table->text('address');
            $table->foreignId('warehouse_type_id')->constrained('types_of_warehouse_districts');
            $table->foreignId('city_id')->constrained('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_districts');
    }
}
