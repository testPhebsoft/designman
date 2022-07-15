<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
