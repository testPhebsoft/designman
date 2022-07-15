<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('project_code');
            $table->string('location');
            $table->longText('project_nature')->nullable();
            $table->longText('project_scope')->nullable();
            $table->string('estimated_cost')->nullable();
            $table->string('estimated_duration')->nullable();
            $table->string('employees_assigned')->nullable();
            $table->string('handled_as');
            $table->string('venture_firm')->nullable();
            $table->string('sub_contractors')->nullable();
            $table->date('signing_date')->nullable();
            $table->date('implementation_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
