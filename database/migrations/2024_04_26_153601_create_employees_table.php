<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->string('position');
            $table->timestamps();
            $table->softDeletes(); // Add this line
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
