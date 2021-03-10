<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('employee_code', 5);
            $table->string('employee_name', 50);
            $table->integer('gender');
            $table->string('contract_status', 1);
            $table->timestamps();
            $table->softDeletes();
            $table->string('updated_by' , 5);
            $table->primary('employee_code');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
