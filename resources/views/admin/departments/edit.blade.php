@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.departments.update", [$department->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.department.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $department->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.department.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $department->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_code">{{ trans('cruds.department.fields.department_code') }}</label>
                <input class="form-control {{ $errors->has('department_code') ? 'is-invalid' : '' }}" type="text" name="department_code" id="department_code" value="{{ old('department_code', $department->department_code) }}" required>
                @if($errors->has('department_code'))
                    <span class="text-danger">{{ $errors->first('department_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_head_id">{{ trans('cruds.department.fields.department_head') }}</label>
                <select class="form-control select2 {{ $errors->has('department_head') ? 'is-invalid' : '' }}" name="department_head_id" id="department_head_id">
                    @foreach($department_heads as $id => $entry)
                        <option value="{{ $id }}" {{ (old('department_head_id') ? old('department_head_id') : $department->department_head->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_head'))
                    <span class="text-danger">{{ $errors->first('department_head') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_head_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="roles_responsibilities">{{ trans('cruds.department.fields.roles_responsibilities') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('roles_responsibilities') ? 'is-invalid' : '' }}" name="roles_responsibilities" id="roles_responsibilities">{!! old('roles_responsibilities', $department->roles_responsibilities) !!}</textarea>
                @if($errors->has('roles_responsibilities'))
                    <span class="text-danger">{{ $errors->first('roles_responsibilities') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.roles_responsibilities_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_assets">{{ trans('cruds.department.fields.department_assets') }}</label>
                <textarea class="form-control {{ $errors->has('department_assets') ? 'is-invalid' : '' }}" name="department_assets" id="department_assets">{{ old('department_assets', $department->department_assets) }}</textarea>
                @if($errors->has('department_assets'))
                    <span class="text-danger">{{ $errors->first('department_assets') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.department.fields.department_assets_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.departments.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $department->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection