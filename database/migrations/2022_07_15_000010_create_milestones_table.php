<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestonesTable extends Migration
{
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('hourly_rate', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
