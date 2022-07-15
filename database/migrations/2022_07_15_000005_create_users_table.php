<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('father_name')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('designation')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('contact_number')->nullable();
            $table->longText('residence_address')->nullable();
            $table->string('cnic')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('disability')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('job_status')->nullable();
            $table->string('code_membership_professional')->nullable();
            $table->longText('country_work_experience')->nullable();
            $table->string('account_title')->nullable();
            $table->string('account_num')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
