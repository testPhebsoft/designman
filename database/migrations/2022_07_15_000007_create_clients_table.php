<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('client_code');
            $table->string('client_address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('telephone_num')->nullable();
            $table->string('city');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
