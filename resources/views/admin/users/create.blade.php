@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.user.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.user.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employee_code">{{ trans('cruds.user.fields.employee_code') }}</label>
                <input class="form-control {{ $errors->has('employee_code') ? 'is-invalid' : '' }}" type="text" name="employee_code" id="employee_code" value="{{ old('employee_code', '') }}" required>
                @if($errors->has('employee_code'))
                    <span class="text-danger">{{ $errors->first('employee_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.employee_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_name">{{ trans('cruds.user.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}" required>
                @if($errors->has('father_name'))
                    <span class="text-danger">{{ $errors->first('father_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="joining_date">{{ trans('cruds.user.fields.joining_date') }}</label>
                <input class="form-control date {{ $errors->has('joining_date') ? 'is-invalid' : '' }}" type="text" name="joining_date" id="joining_date" value="{{ old('joining_date') }}">
                @if($errors->has('joining_date'))
                    <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.joining_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="designation">{{ trans('cruds.user.fields.designation') }}</label>
                <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" type="text" name="designation" id="designation" value="{{ old('designation', '') }}" required>
                @if($errors->has('designation'))
                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                @if($errors->has('date_of_birth'))
                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_number">{{ trans('cruds.user.fields.contact_number') }}</label>
                <input class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', '') }}" required>
                @if($errors->has('contact_number'))
                    <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.contact_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="residence_address">{{ trans('cruds.user.fields.residence_address') }}</label>
                <textarea class="form-control {{ $errors->has('residence_address') ? 'is-invalid' : '' }}" name="residence_address" id="residence_address">{{ old('residence_address') }}</textarea>
                @if($errors->has('residence_address'))
                    <span class="text-danger">{{ $errors->first('residence_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.residence_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cnic">{{ trans('cruds.user.fields.cnic') }}</label>
                <input class="form-control {{ $errors->has('cnic') ? 'is-invalid' : '' }}" type="text" name="cnic" id="cnic" value="{{ old('cnic', '') }}">
                @if($errors->has('cnic'))
                    <span class="text-danger">{{ $errors->first('cnic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.cnic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="citizenship">{{ trans('cruds.user.fields.citizenship') }}</label>
                <input class="form-control {{ $errors->has('citizenship') ? 'is-invalid' : '' }}" type="text" name="citizenship" id="citizenship" value="{{ old('citizenship', '') }}" required>
                @if($errors->has('citizenship'))
                    <span class="text-danger">{{ $errors->first('citizenship') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.citizenship_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="disability">{{ trans('cruds.user.fields.disability') }}</label>
                <input class="form-control {{ $errors->has('disability') ? 'is-invalid' : '' }}" type="text" name="disability" id="disability" value="{{ old('disability', 'No') }}" required>
                @if($errors->has('disability'))
                    <span class="text-danger">{{ $errors->first('disability') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.disability_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="blood_group">{{ trans('cruds.user.fields.blood_group') }}</label>
                <input class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}" type="text" name="blood_group" id="blood_group" value="{{ old('blood_group', '') }}" required>
                @if($errors->has('blood_group'))
                    <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.blood_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.job_status') }}</label>
                <select class="form-control {{ $errors->has('job_status') ? 'is-invalid' : '' }}" name="job_status" id="job_status">
                    <option value disabled {{ old('job_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::JOB_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('job_status', 'Working') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_status'))
                    <span class="text-danger">{{ $errors->first('job_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.job_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code_membership_professional">{{ trans('cruds.user.fields.code_membership_professional') }}</label>
                <input class="form-control {{ $errors->has('code_membership_professional') ? 'is-invalid' : '' }}" type="text" name="code_membership_professional" id="code_membership_professional" value="{{ old('code_membership_professional', '') }}">
                @if($errors->has('code_membership_professional'))
                    <span class="text-danger">{{ $errors->first('code_membership_professional') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.code_membership_professional_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code_membership_attachment">{{ trans('cruds.user.fields.code_membership_attachment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('code_membership_attachment') ? 'is-invalid' : '' }}" id="code_membership_attachment-dropzone">
                </div>
                @if($errors->has('code_membership_attachment'))
                    <span class="text-danger">{{ $errors->first('code_membership_attachment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.code_membership_attachment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_work_experience">{{ trans('cruds.user.fields.country_work_experience') }}</label>
                <textarea class="form-control {{ $errors->has('country_work_experience') ? 'is-invalid' : '' }}" name="country_work_experience" id="country_work_experience">{{ old('country_work_experience') }}</textarea>
                @if($errors->has('country_work_experience'))
                    <span class="text-danger">{{ $errors->first('country_work_experience') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_work_experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_title">{{ trans('cruds.user.fields.account_title') }}</label>
                <input class="form-control {{ $errors->has('account_title') ? 'is-invalid' : '' }}" type="text" name="account_title" id="account_title" value="{{ old('account_title', '') }}" required>
                @if($errors->has('account_title'))
                    <span class="text-danger">{{ $errors->first('account_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.account_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_num">{{ trans('cruds.user.fields.account_num') }}</label>
                <input class="form-control {{ $errors->has('account_num') ? 'is-invalid' : '' }}" type="text" name="account_num" id="account_num" value="{{ old('account_num', '') }}" required>
                @if($errors->has('account_num'))
                    <span class="text-danger">{{ $errors->first('account_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.account_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bank_name">{{ trans('cruds.user.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}" required>
                @if($errors->has('bank_name'))
                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_branch">{{ trans('cruds.user.fields.bank_branch') }}</label>
                <input class="form-control {{ $errors->has('bank_branch') ? 'is-invalid' : '' }}" type="text" name="bank_branch" id="bank_branch" value="{{ old('bank_branch', '') }}">
                @if($errors->has('bank_branch'))
                    <span class="text-danger">{{ $errors->first('bank_branch') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.bank_branch_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->image)
      var file = {!! json_encode($user->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.codeMembershipAttachmentDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="code_membership_attachment"]').remove()
      $('form').append('<input type="hidden" name="code_membership_attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="code_membership_attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->code_membership_attachment)
      var file = {!! json_encode($user->code_membership_attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="code_membership_attachment" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection