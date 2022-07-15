<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'department_create',
            ],
            [
                'id'    => 18,
                'title' => 'department_edit',
            ],
            [
                'id'    => 19,
                'title' => 'department_show',
            ],
            [
                'id'    => 20,
                'title' => 'department_delete',
            ],
            [
                'id'    => 21,
                'title' => 'department_access',
            ],
            [
                'id'    => 22,
                'title' => 'client_create',
            ],
            [
                'id'    => 23,
                'title' => 'client_edit',
            ],
            [
                'id'    => 24,
                'title' => 'client_show',
            ],
            [
                'id'    => 25,
                'title' => 'client_delete',
            ],
            [
                'id'    => 26,
                'title' => 'client_access',
            ],
            [
                'id'    => 27,
                'title' => 'project_category_create',
            ],
            [
                'id'    => 28,
                'title' => 'project_category_edit',
            ],
            [
                'id'    => 29,
                'title' => 'project_category_show',
            ],
            [
                'id'    => 30,
                'title' => 'project_category_delete',
            ],
            [
                'id'    => 31,
                'title' => 'project_category_access',
            ],
            [
                'id'    => 32,
                'title' => 'project_create',
            ],
            [
                'id'    => 33,
                'title' => 'project_edit',
            ],
            [
                'id'    => 34,
                'title' => 'project_show',
            ],
            [
                'id'    => 35,
                'title' => 'project_delete',
            ],
            [
                'id'    => 36,
                'title' => 'project_access',
            ],
            [
                'id'    => 37,
                'title' => 'milestone_create',
            ],
            [
                'id'    => 38,
                'title' => 'milestone_edit',
            ],
            [
                'id'    => 39,
                'title' => 'milestone_show',
            ],
            [
                'id'    => 40,
                'title' => 'milestone_delete',
            ],
            [
                'id'    => 41,
                'title' => 'milestone_access',
            ],
            [
                'id'    => 42,
                'title' => 'timesheet_create',
            ],
            [
                'id'    => 43,
                'title' => 'timesheet_edit',
            ],
            [
                'id'    => 44,
                'title' => 'timesheet_show',
            ],
            [
                'id'    => 45,
                'title' => 'timesheet_delete',
            ],
            [
                'id'    => 46,
                'title' => 'timesheet_access',
            ],
            [
                'id'    => 47,
                'title' => 'document_create',
            ],
            [
                'id'    => 48,
                'title' => 'document_edit',
            ],
            [
                'id'    => 49,
                'title' => 'document_show',
            ],
            [
                'id'    => 50,
                'title' => 'document_delete',
            ],
            [
                'id'    => 51,
                'title' => 'document_access',
            ],
            [
                'id'    => 52,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 53,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 54,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 55,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 56,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 57,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 58,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 59,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 60,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 61,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 62,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 63,
                'title' => 'task_create',
            ],
            [
                'id'    => 64,
                'title' => 'task_edit',
            ],
            [
                'id'    => 65,
                'title' => 'task_show',
            ],
            [
                'id'    => 66,
                'title' => 'task_delete',
            ],
            [
                'id'    => 67,
                'title' => 'task_access',
            ],
            [
                'id'    => 68,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 69,
                'title' => 'setting_create',
            ],
            [
                'id'    => 70,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 71,
                'title' => 'setting_show',
            ],
            [
                'id'    => 72,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 73,
                'title' => 'setting_access',
            ],
            [
                'id'    => 74,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 75,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 76,
                'title' => 'subcontractor_create',
            ],
            [
                'id'    => 77,
                'title' => 'subcontractor_edit',
            ],
            [
                'id'    => 78,
                'title' => 'subcontractor_show',
            ],
            [
                'id'    => 79,
                'title' => 'subcontractor_delete',
            ],
            [
                'id'    => 80,
                'title' => 'subcontractor_access',
            ],
            [
                'id'    => 81,
                'title' => 'joint_venture_firm_create',
            ],
            [
                'id'    => 82,
                'title' => 'joint_venture_firm_edit',
            ],
            [
                'id'    => 83,
                'title' => 'joint_venture_firm_show',
            ],
            [
                'id'    => 84,
                'title' => 'joint_venture_firm_delete',
            ],
            [
                'id'    => 85,
                'title' => 'joint_venture_firm_access',
            ],
            [
                'id'    => 86,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
