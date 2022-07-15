@extends('layouts.admin')
@section('content')
@can('subcontractor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.subcontractors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.subcontractor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.subcontractor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Subcontractor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.contract_person') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.agreement') }}
                        </th>
                        <th>
                            {{ trans('cruds.subcontractor.fields.assignment_value') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcontractors as $key => $subcontractor)
                        <tr data-entry-id="{{ $subcontractor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subcontractor->id ?? '' }}
                            </td>
                            <td>
                                {{ $subcontractor->name ?? '' }}
                            </td>
                            <td>
                                {{ $subcontractor->code ?? '' }}
                            </td>
                            <td>
                                {{ $subcontractor->address ?? '' }}
                            </td>
                            <td>
                                {{ $subcontractor->contract_person ?? '' }}
                            </td>
                            <td>
                                {{ $subcontractor->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $subcontractor->end_date ?? '' }}
                            </td>
                            <td>
                                @if($subcontractor->agreement)
                                    <a href="{{ $subcontractor->agreement->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $subcontractor->assignment_value ?? '' }}
                            </td>
                            <td>
                                @can('subcontractor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.subcontractors.show', $subcontractor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('subcontractor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subcontractors.edit', $subcontractor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('subcontractor_delete')
                                    <form action="{{ route('admin.subcontractors.destroy', $subcontractor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('subcontractor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subcontractors.massDestroy') }}",
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
  let table = $('.datatable-Subcontractor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection