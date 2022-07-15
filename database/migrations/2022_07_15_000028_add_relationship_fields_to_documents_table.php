<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedBigInteger('timesheet_id')->nullable();
            $table->foreign('timesheet_id', 'timesheet_fk_6874967')->references('id')->on('timesheets');
            $table->unsignedBigInteger('uploaded_by_id')->nullable();
            $table->foreign('uploaded_by_id', 'uploaded_by_fk_6874969')->references('id')->on('users');
        });
    }
}
