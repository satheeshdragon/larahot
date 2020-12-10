<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_first_name')->nullable();
            $table->string('employee_last_name')->nullable();
            $table->integer('employee_ref_number')->nullable();
            $table->integer('employee_phone_number')->nullable();
            $table->string('employee_address')->nullable();
            $table->string('employee_address_two')->nullable();
            $table->string('employee_country')->nullable();
            $table->string('employee_state')->nullable();
            $table->string('employee_city')->nullable();
            $table->string('employee_email')->nullable();
            $table->string('employee_pin_code')->nullable();
            $table->string('employee_reference')->nullable();
            $table->string('employee_unique_identy')->nullable();
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
        Schema::dropIfExists('employee');
    }
}
