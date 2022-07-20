@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dispute.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disputes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.id') }}
                        </th>
                        <td>
                            {{ $dispute->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.title') }}
                        </th>
                        <td>
                            {{ $dispute->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.project') }}
                        </th>
                        <td>
                            {{ $dispute->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.documents') }}
                        </th>
                        <td>
                            @foreach($dispute->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.start_date') }}
                        </th>
                        <td>
                            {{ $dispute->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.end_date') }}
                        </th>
                        <td>
                            {{ $dispute->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.notes') }}
                        </th>
                        <td>
                            {{ $dispute->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dispute.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Dispute::STATUS_SELECT[$dispute->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disputes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection