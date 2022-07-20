<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                                  => 'ID',
            'id_helper'                           => ' ',
            'name'                                => 'Name',
            'name_helper'                         => ' ',
            'email'                               => 'Email',
            'email_helper'                        => ' ',
            'email_verified_at'                   => 'Email verified at',
            'email_verified_at_helper'            => ' ',
            'password'                            => 'Password',
            'password_helper'                     => ' ',
            'roles'                               => 'Roles',
            'roles_helper'                        => ' ',
            'remember_token'                      => 'Remember Token',
            'remember_token_helper'               => ' ',
            'created_at'                          => 'Created at',
            'created_at_helper'                   => ' ',
            'updated_at'                          => 'Updated at',
            'updated_at_helper'                   => ' ',
            'deleted_at'                          => 'Deleted at',
            'deleted_at_helper'                   => ' ',
            'department'                          => 'Department',
            'department_helper'                   => ' ',
            'image'                               => 'Image',
            'image_helper'                        => ' ',
            'employee_code'                       => 'Employee Code',
            'employee_code_helper'                => ' ',
            'father_name'                         => 'Father Name',
            'father_name_helper'                  => ' ',
            'joining_date'                        => 'Joining Date',
            'joining_date_helper'                 => ' ',
            'designation'                         => 'Designation',
            'designation_helper'                  => ' ',
            'date_of_birth'                       => 'Date of Birth',
            'date_of_birth_helper'                => ' ',
            'contact_number'                      => 'Contact Number',
            'contact_number_helper'               => ' ',
            'residence_address'                   => 'Residence Address',
            'residence_address_helper'            => ' ',
            'cnic'                                => 'CNIC',
            'cnic_helper'                         => ' ',
            'citizenship'                         => 'Citizenship',
            'citizenship_helper'                  => ' ',
            'disability'                          => 'Disability',
            'disability_helper'                   => ' ',
            'blood_group'                         => 'Blood Group',
            'blood_group_helper'                  => ' ',
            'job_status'                          => 'Job Status',
            'job_status_helper'                   => ' ',
            'code_membership_professional'        => 'Code Membership Professional',
            'code_membership_professional_helper' => ' ',
            'code_membership_attachment'          => 'Code Membership Professional Attachment',
            'code_membership_attachment_helper'   => ' ',
            'country_work_experience'             => 'Countries Work Experience',
            'country_work_experience_helper'      => ' ',
            'account_title'                       => 'Bank Account Title',
            'account_title_helper'                => ' ',
            'account_num'                         => 'Bank Account Number',
            'account_num_helper'                  => ' ',
            'bank_name'                           => 'Bank Name',
            'bank_name_helper'                    => ' ',
            'bank_branch'                         => 'Bank Branch',
            'bank_branch_helper'                  => 'optional',
            'job_duration'                        => 'Duration of Job',
            'name_of_degree'                      => 'Name of Degree',
            'educational_institute'               => 'Educational Institute',
            'degree_duration'                     => 'Period(Duration)',
            'degree_attachment'                   => 'Attachment',
            'language_reading'                    => 'Reading',
            'language_writing'                    => 'Writing',
            'language_speaking'                   => 'Speaking',
            'employement_company_name'            => 'Name of Company',
            'employement_start_date'              => 'Start Date',
            'employement_end_date'                => 'End Date',
            'employement_designation'             => 'Designation',
            'promotion_date'                      => 'Promotion Date',
            'promotion_designation'               => 'Designation',
        ],
    ],
    'department' => [
        'title'          => 'Department',
        'title_singular' => 'Department',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'name'                          => 'Name',
            'name_helper'                   => ' ',
            'description'                   => 'Description',
            'description_helper'            => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
            'department_code'               => 'Department Code',
            'department_code_helper'        => ' ',
            'department_head'               => 'Department Head',
            'department_head_helper'        => ' ',
            'roles_responsibilities'        => 'Roles/Responsibilities',
            'roles_responsibilities_helper' => ' ',
            'department_assets'             => 'Assets',
            'department_assets_helper'      => ' ',
            'department_count_users'      => 'Number of Employees',
        ],
    ],
    'client' => [
        'title'          => 'Client',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'client_code'           => 'Client Code',
            'client_code_helper'    => ' ',
            'client_address'        => 'Client Address',
            'client_address_helper' => ' ',
            'contact_person'        => 'Contact Person',
            'contact_person_helper' => ' ',
            'telephone_num'         => 'Telephone Number',
            'telephone_num_helper'  => ' ',
            'city'                  => 'City',
            'city_helper'           => ' ',
            'mou'                   => 'MOU',
            'mou_helper'            => ' ',
            'number_of_projects'    => 'Number of Projects'
        ],
    ],
    'projectCategory' => [
        'title'          => 'Project Category',
        'title_singular' => 'Project Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'parent'             => 'Parent',
            'parent_helper'      => ' ',
        ],
    ],
    'project' => [
        'title'          => 'Project',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'name'                       => 'Name',
            'name_helper'                => ' ',
            'description'                => 'Description',
            'description_helper'         => ' ',
            'client'                     => 'Client',
            'client_helper'              => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'category'                   => 'Category',
            'category_helper'            => ' ',
            'project_code'               => 'Project Code',
            'project_code_helper'        => ' ',
            'location'                   => 'Location',
            'location_helper'            => 'Province/ Country',
            'project_nature'             => 'Nature of Project',
            'project_nature_helper'      => ' ',
            'project_scope'              => 'Scope of Project',
            'project_scope_helper'       => ' ',
            'estimated_cost'             => 'Estimated Cost',
            'estimated_cost_helper'      => ' ',
            'estimated_duration'         => 'Estimated Duration',
            'estimated_duration_helper'  => ' ',
            'employees_assigned'         => 'Employees Assigned',
            'employees_assigned_helper'  => ' ',
            'project_head'               => 'Head of Project',
            'project_head_helper'        => ' ',
            'handled_as'                 => 'Handled As',
            'handled_as_helper'          => ' ',
            'venture_firm'               => 'Joint Venture Firm(s)',
            'venture_firm_helper'        => ' ',
            'sub_contractors'            => 'Sub-Contractor(s) Name',
            'sub_contractors_helper'     => ' ',
            'signing_date'               => 'Signing Date',
            'signing_date_helper'        => ' ',
            'implementation_date'        => 'Implementation Date',
            'implementation_date_helper' => ' ',
            'agreement_atachment'        => 'Agreement Atachment',
            'agreement_atachment_helper' => ' ',
        ],
    ],
    'milestone' => [
        'title'          => 'Milestone',
        'title_singular' => 'Milestone',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'start_date'         => 'Start Date',
            'start_date_helper'  => ' ',
            'end_date'           => 'End Date',
            'end_date_helper'    => ' ',
            'hourly_rate'        => 'Hourly Rate',
            'hourly_rate_helper' => ' ',
            'project'            => 'Project',
            'project_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'timesheet' => [
        'title'          => 'Timesheet',
        'title_singular' => 'Timesheet',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
            'date'                 => 'Date',
            'date_helper'          => ' ',
            'start_time'           => 'Start Time',
            'start_time_helper'    => ' ',
            'end_time'             => 'End Time',
            'end_time_helper'      => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'approved_user'        => 'Approved By',
            'approved_user_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'title'                => 'Title',
            'title_helper'         => ' ',
            'task'                 => 'Task',
            'task_helper'          => ' ',
        ],
    ],
    'document' => [
        'title'          => 'Document',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'timesheet'          => 'Timesheet',
            'timesheet_helper'   => ' ',
            'file'               => 'File',
            'file_helper'        => ' ',
            'uploaded_by'        => 'Uploaded By',
            'uploaded_by_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'taskManagement' => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task' => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'tag'                 => 'Tags',
            'tag_helper'          => ' ',
            'attachment'          => 'Attachment',
            'attachment_helper'   => ' ',
            'due_date'            => 'Due date',
            'due_date_helper'     => ' ',
            'assigned_to'         => 'Assigned to',
            'assigned_to_helper'  => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated At',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted At',
            'deleted_at_helper'   => ' ',
            'milestone'           => 'Milestone',
            'milestone_helper'    => ' ',
            'hours_locked'        => 'Hours Completed',
            'hours_locked_helper' => ' ',
        ],
    ],
    'tasksCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'setting' => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'key'               => 'Key',
            'key_helper'        => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'subcontractor' => [
        'title'          => 'Subcontractor',
        'title_singular' => 'Subcontractor',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'code'                    => 'Code',
            'code_helper'             => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'contract_person'         => 'Contract Person',
            'contract_person_helper'  => ' ',
            'start_date'              => 'Start Date',
            'start_date_helper'       => ' ',
            'end_date'                => 'End Date',
            'end_date_helper'         => ' ',
            'agreement'               => 'Agreement',
            'agreement_helper'        => ' ',
            'assignment_value'        => 'Assignment Value',
            'assignment_value_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'jointVentureFirm' => [
        'title'          => 'Joint Venture Firm',
        'title_singular' => 'Joint Venture Firm',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'code'                        => 'Code',
            'code_helper'                 => ' ',
            'firm_name'                   => 'Firm Name',
            'firm_name_helper'            => ' ',
            'firm_code'                   => 'Firm Code',
            'firm_code_helper'            => ' ',
            'address'                     => 'Address',
            'address_helper'              => ' ',
            'contract_person'             => 'Contract Person',
            'contract_person_helper'      => ' ',
            'joint_venture_nature'        => 'Nature of Joint Venture',
            'joint_venture_nature_helper' => ' ',
            'leading_firm_name'           => 'Leading Firm Name',
            'leading_firm_name_helper'    => ' ',
            'share_value'                 => 'Share Value',
            'share_value_helper'          => 'Share Value /Percentage of Each Firm',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
];
