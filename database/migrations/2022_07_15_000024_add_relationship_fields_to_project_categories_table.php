<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('project_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id', 'parent_fk_6874627')->references('id')->on('project_categories');
        });
    }
}
