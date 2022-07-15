<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTimesheetRequest;
use App\Http\Requests\StoreTimesheetRequest;
use App\Http\Requests\UpdateTimesheetRequest;
use App\Models\Task;
use App\Models\Timesheet;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimesheetController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('timesheet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timesheets = Timesheet::with(['task', 'user', 'approved_user'])->get();

        return view('admin.timesheets.index', compact('timesheets'));
    }

    public function create()
    {
        abort_if(Gate::denies('timesheet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.timesheets.create', compact('approved_users', 'tasks', 'users'));
    }

    public function store(StoreTimesheetRequest $request)
    {
        $timesheet = Timesheet::create($request->all());

        return redirect()->route('admin.timesheets.index');
    }

    public function edit(Timesheet $timesheet)
    {
        abort_if(Gate::denies('timesheet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timesheet->load('task', 'user', 'approved_user');

        return view('admin.timesheets.edit', compact('approved_users', 'tasks', 'timesheet', 'users'));
    }

    public function update(UpdateTimesheetRequest $request, Timesheet $timesheet)
    {
        $timesheet->update($request->all());

        return redirect()->route('admin.timesheets.index');
    }

    public function show(Timesheet $timesheet)
    {
        abort_if(Gate::denies('timesheet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timesheet->load('task', 'user', 'approved_user');

        return view('admin.timesheets.show', compact('timesheet'));
    }

    public function destroy(Timesheet $timesheet)
    {
        abort_if(Gate::denies('timesheet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timesheet->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimesheetRequest $request)
    {
        Timesheet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
