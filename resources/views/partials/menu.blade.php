<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('department_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-hospital">

                            </i>
                            <p>
                                {{ trans('cruds.department.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('client_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-friends">

                            </i>
                            <p>
                                {{ trans('cruds.client.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('project_category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.project-categories.index") }}" class="nav-link {{ request()->is("admin/project-categories") || request()->is("admin/project-categories/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-address-book">

                            </i>
                            <p>
                                {{ trans('cruds.projectCategory.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('subcontractor_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.subcontractors.index") }}" class="nav-link {{ request()->is("admin/subcontractors") || request()->is("admin/subcontractors/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-hotel">

                            </i>
                            <p>
                                {{ trans('cruds.subcontractor.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('joint_venture_firm_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.joint-venture-firms.index") }}" class="nav-link {{ request()->is("admin/joint-venture-firms") || request()->is("admin/joint-venture-firms/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fab fa-firefox">

                            </i>
                            <p>
                                {{ trans('cruds.jointVentureFirm.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('project_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-project-diagram">

                            </i>
                            <p>
                                {{ trans('cruds.project.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('milestone_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.milestones.index") }}" class="nav-link {{ request()->is("admin/milestones") || request()->is("admin/milestones/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-clock">

                            </i>
                            <p>
                                {{ trans('cruds.milestone.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('timesheet_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.timesheets.index") }}" class="nav-link {{ request()->is("admin/timesheets") || request()->is("admin/timesheets/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-clock">

                            </i>
                            <p>
                                {{ trans('cruds.timesheet.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('document_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-file">

                            </i>
                            <p>
                                {{ trans('cruds.document.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/task-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/task-tags*") ? "menu-open" : "" }} {{ request()->is("admin/tasks*") ? "menu-open" : "" }} {{ request()->is("admin/tasks-calendars*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-list">

                            </i>
                            <p>
                                {{ trans('cruds.taskManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-tags.index") }}" class="nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.task.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tasks_calendar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tasksCalendar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>