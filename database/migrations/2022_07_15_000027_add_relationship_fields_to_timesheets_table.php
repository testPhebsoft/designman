<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id', 'task_fk_6884261')->references('id')->on('tasks');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6874822')->references('id')->on('users');
            $table->unsignedBigInteger('approved_user_id')->nullable();
            $table->foreign('approved_user_id', 'approved_user_fk_6874827')->references('id')->on('users');
        });
    }
}
