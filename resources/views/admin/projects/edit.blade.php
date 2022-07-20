@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.update", [$project->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.project.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $project->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.project.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $project->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $project->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.project.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $project->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_code">{{ trans('cruds.project.fields.project_code') }}</label>
                <input class="form-control {{ $errors->has('project_code') ? 'is-invalid' : '' }}" type="text" name="project_code" id="project_code" value="{{ old('project_code', $project->project_code) }}" required>
                @if($errors->has('project_code'))
                    <span class="text-danger">{{ $errors->first('project_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location">{{ trans('cruds.project.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $project->location) }}" required>
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_nature">{{ trans('cruds.project.fields.project_nature') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('project_nature') ? 'is-invalid' : '' }}" name="project_nature" id="project_nature">{!! old('project_nature', $project->project_nature) !!}</textarea>
                @if($errors->has('project_nature'))
                    <span class="text-danger">{{ $errors->first('project_nature') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_nature_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_scope">{{ trans('cruds.project.fields.project_scope') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('project_scope') ? 'is-invalid' : '' }}" name="project_scope" id="project_scope">{!! old('project_scope', $project->project_scope) !!}</textarea>
                @if($errors->has('project_scope'))
                    <span class="text-danger">{{ $errors->first('project_scope') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_scope_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estimated_cost">{{ trans('cruds.project.fields.estimated_cost') }}</label>
                <input class="form-control {{ $errors->has('estimated_cost') ? 'is-invalid' : '' }}" type="text" name="estimated_cost" id="estimated_cost" value="{{ old('estimated_cost', $project->estimated_cost) }}">
                @if($errors->has('estimated_cost'))
                    <span class="text-danger">{{ $errors->first('estimated_cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.estimated_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estimated_duration">{{ trans('cruds.project.fields.estimated_duration') }}</label>
                <input class="form-control {{ $errors->has('estimated_duration') ? 'is-invalid' : '' }}" type="text" name="estimated_duration" id="estimated_duration" value="{{ old('estimated_duration', $project->estimated_duration) }}">
                @if($errors->has('estimated_duration'))
                    <span class="text-danger">{{ $errors->first('estimated_duration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.estimated_duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employees_assigned">{{ trans('cruds.project.fields.employees_assigned') }}</label>
                <input class="form-control {{ $errors->has('employees_assigned') ? 'is-invalid' : '' }}" type="text" name="employees_assigned" id="employees_assigned" value="{{ old('employees_assigned', $project->employees_assigned) }}">
                @if($errors->has('employees_assigned'))
                    <span class="text-danger">{{ $errors->first('employees_assigned') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.employees_assigned_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_head_id">{{ trans('cruds.project.fields.project_head') }}</label>
                <select class="form-control select2 {{ $errors->has('project_head') ? 'is-invalid' : '' }}" name="project_head_id" id="project_head_id">
                    @foreach($project_heads as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_head_id') ? old('project_head_id') : $project->project_head->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_head'))
                    <span class="text-danger">{{ $errors->first('project_head') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_head_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.project.fields.handled_as') }}</label>
                <select class="form-control {{ $errors->has('handled_as') ? 'is-invalid' : '' }}" name="handled_as" id="handled_as" required>
                    <option value disabled {{ old('handled_as', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::HANDLED_AS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('handled_as', $project->handled_as) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('handled_as'))
                    <span class="text-danger">{{ $errors->first('handled_as') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.handled_as_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venture_firm">{{ trans('cruds.project.fields.venture_firm') }}</label>
                <input class="form-control {{ $errors->has('venture_firm') ? 'is-invalid' : '' }}" type="text" name="venture_firm" id="venture_firm" value="{{ old('venture_firm', $project->venture_firm) }}">
                @if($errors->has('venture_firm'))
                    <span class="text-danger">{{ $errors->first('venture_firm') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.venture_firm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_contractors">{{ trans('cruds.project.fields.sub_contractors') }}</label>
                <input class="form-control {{ $errors->has('sub_contractors') ? 'is-invalid' : '' }}" type="text" name="sub_contractors" id="sub_contractors" value="{{ old('sub_contractors', $project->sub_contractors) }}">
                @if($errors->has('sub_contractors'))
                    <span class="text-danger">{{ $errors->first('sub_contractors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.sub_contractors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signing_date">{{ trans('cruds.project.fields.signing_date') }}</label>
                <input class="form-control date {{ $errors->has('signing_date') ? 'is-invalid' : '' }}" type="text" name="signing_date" id="signing_date" value="{{ old('signing_date', $project->signing_date) }}">
                @if($errors->has('signing_date'))
                    <span class="text-danger">{{ $errors->first('signing_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.signing_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="implementation_date">{{ trans('cruds.project.fields.implementation_date') }}</label>
                <input class="form-control date {{ $errors->has('implementation_date') ? 'is-invalid' : '' }}" type="text" name="implementation_date" id="implementation_date" value="{{ old('implementation_date', $project->implementation_date) }}">
                @if($errors->has('implementation_date'))
                    <span class="text-danger">{{ $errors->first('implementation_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.implementation_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.project.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $project->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agreement_atachment">{{ trans('cruds.project.fields.agreement_atachment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('agreement_atachment') ? 'is-invalid' : '' }}" id="agreement_atachment-dropzone">
                </div>
                @if($errors->has('agreement_atachment'))
                    <span class="text-danger">{{ $errors->first('agreement_atachment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.agreement_atachment_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.projects.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $project->id ?? 0 }}');
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

<script>
    Dropzone.options.agreementAtachmentDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
      $('form').find('input[name="agreement_atachment"]').remove()
      $('form').append('<input type="hidden" name="agreement_atachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="agreement_atachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->agreement_atachment)
      var file = {!! json_encode($project->agreement_atachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="agreement_atachment" value="' + file.file_name + '">')
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