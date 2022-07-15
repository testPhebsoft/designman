<div class="m-3">
    @can('project_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-projectHeadProjects">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.project.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.client') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.category') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.project_code') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.location') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.estimated_cost') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.estimated_duration') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.employees_assigned') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.project_head') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.handled_as') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.venture_firm') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.sub_contractors') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.signing_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.implementation_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.project.fields.agreement_atachment') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $key => $project)
                            <tr data-entry-id="{{ $project->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $project->id ?? '' }}
                                </td>
                                <td>
                                    {{ $project->name ?? '' }}
                                </td>
                                <td>
                                    {{ $project->description ?? '' }}
                                </td>
                                <td>
                                    {{ $project->client->name ?? '' }}
                                </td>
                                <td>
                                    {{ $project->category->name ?? '' }}
                                </td>
                                <td>
                                    {{ $project->project_code ?? '' }}
                                </td>
                                <td>
                                    {{ $project->location ?? '' }}
                                </td>
                                <td>
                                    {{ $project->estimated_cost ?? '' }}
                                </td>
                                <td>
                                    {{ $project->estimated_duration ?? '' }}
                                </td>
                                <td>
                                    {{ $project->employees_assigned ?? '' }}
                                </td>
                                <td>
                                    {{ $project->project_head->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Project::HANDLED_AS_SELECT[$project->handled_as] ?? '' }}
                                </td>
                                <td>
                                    {{ $project->venture_firm ?? '' }}
                                </td>
                                <td>
                                    {{ $project->sub_contractors ?? '' }}
                                </td>
                                <td>
                                    {{ $project->signing_date ?? '' }}
                                </td>
                                <td>
                                    {{ $project->implementation_date ?? '' }}
                                </td>
                                <td>
                                    @if($project->agreement_atachment)
                                        <a href="{{ $project->agreement_atachment->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @can('project_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.projects.show', $project->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('project_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.projects.edit', $project->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('project_delete')
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.projects.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-projectHeadProjects:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection