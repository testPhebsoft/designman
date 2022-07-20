<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputesTable extends Migration
{
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
