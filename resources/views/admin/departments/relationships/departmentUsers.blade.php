<div class="m-3">
    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-departmentUsers">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email_verified_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.department') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.employee_code') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.father_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.joining_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.designation') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.date_of_birth') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.contact_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.residence_address') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.cnic') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.citizenship') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.disability') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.blood_group') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.job_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.code_membership_professional') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.code_membership_attachment') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.country_work_experience') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.account_title') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.account_num') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.bank_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.bank_branch') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $user->id ?? '' }}
                                </td>
                                <td>
                                    {{ $user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email_verified_at ?? '' }}
                                </td>
                                <td>
                                    {{ $user->department->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($user->roles as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($user->image)
                                        <a href="{{ $user->image->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $user->image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $user->employee_code ?? '' }}
                                </td>
                                <td>
                                    {{ $user->father_name ?? '' }}
                                </td>
                                <td>
                                    {{ $user->joining_date ?? '' }}
                                </td>
                                <td>
                                    {{ $user->designation ?? '' }}
                                </td>
                                <td>
                                    {{ $user->date_of_birth ?? '' }}
                                </td>
                                <td>
                                    {{ $user->contact_number ?? '' }}
                                </td>
                                <td>
                                    {{ $user->residence_address ?? '' }}
                                </td>
                                <td>
                                    {{ $user->cnic ?? '' }}
                                </td>
                                <td>
                                    {{ $user->citizenship ?? '' }}
                                </td>
                                <td>
                                    {{ $user->disability ?? '' }}
                                </td>
                                <td>
                                    {{ $user->blood_group ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\User::JOB_STATUS_SELECT[$user->job_status] ?? '' }}
                                </td>
                                <td>
                                    {{ $user->code_membership_professional ?? '' }}
                                </td>
                                <td>
                                    @if($user->code_membership_attachment)
                                        <a href="{{ $user->code_membership_attachment->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $user->country_work_experience ?? '' }}
                                </td>
                                <td>
                                    {{ $user->account_title ?? '' }}
                                </td>
                                <td>
                                    {{ $user->account_num ?? '' }}
                                </td>
                                <td>
                                    {{ $user->bank_name ?? '' }}
                                </td>
                                <td>
                                    {{ $user->bank_branch ?? '' }}
                                </td>
                                <td>
                                    @can('user_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('user_delete')
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  let table = $('.datatable-departmentUsers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection