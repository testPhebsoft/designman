<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcontractorsTable extends Migration
{
    public function up()
    {
        Schema::create('subcontractors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->longText('address')->nullable();
            $table->string('contract_person');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('assignment_value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
