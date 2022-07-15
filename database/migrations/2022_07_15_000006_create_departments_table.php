<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('department_code');
            $table->longText('roles_responsibilities')->nullable();
            $table->longText('department_assets')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
