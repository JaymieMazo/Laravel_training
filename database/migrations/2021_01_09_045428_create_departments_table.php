<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->string('company_code', 3);
            $table->string('department_code', 3);
            $table->string('department_name', 30);
            $table->timestamps();
            $table->softDeletes();
            $table->string('updated_by', 5);
            $table->primary( ['department_code' , 'company_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
