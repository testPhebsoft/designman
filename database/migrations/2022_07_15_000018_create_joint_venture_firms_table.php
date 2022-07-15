<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJointVentureFirmsTable extends Migration
{
    public function up()
    {
        Schema::create('joint_venture_firms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('firm_name');
            $table->string('firm_code');
            $table->longText('address')->nullable();
            $table->string('contract_person')->nullable();
            $table->longText('joint_venture_nature')->nullable();
            $table->string('leading_firm_name')->nullable();
            $table->string('share_value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
