<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::post('departments/media', 'DepartmentController@storeMedia')->name('departments.storeMedia');
    Route::post('departments/ckmedia', 'DepartmentController@storeCKEditorImages')->name('departments.storeCKEditorImages');
    Route::resource('departments', 'DepartmentController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientController');

    // Project Category
    Route::delete('project-categories/destroy', 'ProjectCategoryController@massDestroy')->name('project-categories.massDestroy');
    Route::resource('project-categories', 'ProjectCategoryController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectController');

    // Milestone
    Route::delete('milestones/destroy', 'MilestoneController@massDestroy')->name('milestones.massDestroy');
    Route::resource('milestones', 'MilestoneController');

    // Timesheet
    Route::delete('timesheets/destroy', 'TimesheetController@massDestroy')->name('timesheets.massDestroy');
    Route::resource('timesheets', 'TimesheetController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Subcontractor
    Route::delete('subcontractors/destroy', 'SubcontractorController@massDestroy')->name('subcontractors.massDestroy');
    Route::post('subcontractors/media', 'SubcontractorController@storeMedia')->name('subcontractors.storeMedia');
    Route::post('subcontractors/ckmedia', 'SubcontractorController@storeCKEditorImages')->name('subcontractors.storeCKEditorImages');
    Route::resource('subcontractors', 'SubcontractorController');

    // Joint Venture Firm
    Route::delete('joint-venture-firms/destroy', 'JointVentureFirmController@massDestroy')->name('joint-venture-firms.massDestroy');
    Route::post('joint-venture-firms/media', 'JointVentureFirmController@storeMedia')->name('joint-venture-firms.storeMedia');
    Route::post('joint-venture-firms/ckmedia', 'JointVentureFirmController@storeCKEditorImages')->name('joint-venture-firms.storeCKEditorImages');
    Route::resource('joint-venture-firms', 'JointVentureFirmController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
