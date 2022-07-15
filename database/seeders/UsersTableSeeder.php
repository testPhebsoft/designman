<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                           => 1,
                'name'                         => 'Admin',
                'email'                        => 'admin@admin.com',
                'password'                     => bcrypt('password'),
                'remember_token'               => null,
                'employee_code'                => '',
                'father_name'                  => '',
                'designation'                  => '',
                'contact_number'               => '',
                'cnic'                         => '',
                'citizenship'                  => '',
                'disability'                   => '',
                'blood_group'                  => '',
                'code_membership_professional' => '',
                'account_title'                => '',
                'account_num'                  => '',
                'bank_name'                    => '',
                'bank_branch'                  => '',
            ],
        ];

        User::insert($users);
    }
}
