<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_6874653')->references('id')->on('clients');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_6874663')->references('id')->on('project_categories');
            $table->unsignedBigInteger('project_head_id')->nullable();
            $table->foreign('project_head_id', 'project_head_fk_6989261')->references('id')->on('users');
        });
    }
}
