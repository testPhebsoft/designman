@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jointVentureFirm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.joint-venture-firms.update", [$jointVentureFirm->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.jointVentureFirm.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $jointVentureFirm->code) }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="firm_name">{{ trans('cruds.jointVentureFirm.fields.firm_name') }}</label>
                <input class="form-control {{ $errors->has('firm_name') ? 'is-invalid' : '' }}" type="text" name="firm_name" id="firm_name" value="{{ old('firm_name', $jointVentureFirm->firm_name) }}" required>
                @if($errors->has('firm_name'))
                    <span class="text-danger">{{ $errors->first('firm_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.firm_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="firm_code">{{ trans('cruds.jointVentureFirm.fields.firm_code') }}</label>
                <input class="form-control {{ $errors->has('firm_code') ? 'is-invalid' : '' }}" type="text" name="firm_code" id="firm_code" value="{{ old('firm_code', $jointVentureFirm->firm_code) }}" required>
                @if($errors->has('firm_code'))
                    <span class="text-danger">{{ $errors->first('firm_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.firm_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.jointVentureFirm.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $jointVentureFirm->address) }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contract_person">{{ trans('cruds.jointVentureFirm.fields.contract_person') }}</label>
                <input class="form-control {{ $errors->has('contract_person') ? 'is-invalid' : '' }}" type="text" name="contract_person" id="contract_person" value="{{ old('contract_person', $jointVentureFirm->contract_person) }}">
                @if($errors->has('contract_person'))
                    <span class="text-danger">{{ $errors->first('contract_person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.contract_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="joint_venture_nature">{{ trans('cruds.jointVentureFirm.fields.joint_venture_nature') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('joint_venture_nature') ? 'is-invalid' : '' }}" name="joint_venture_nature" id="joint_venture_nature">{!! old('joint_venture_nature', $jointVentureFirm->joint_venture_nature) !!}</textarea>
                @if($errors->has('joint_venture_nature'))
                    <span class="text-danger">{{ $errors->first('joint_venture_nature') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.joint_venture_nature_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="leading_firm_name">{{ trans('cruds.jointVentureFirm.fields.leading_firm_name') }}</label>
                <input class="form-control {{ $errors->has('leading_firm_name') ? 'is-invalid' : '' }}" type="text" name="leading_firm_name" id="leading_firm_name" value="{{ old('leading_firm_name', $jointVentureFirm->leading_firm_name) }}">
                @if($errors->has('leading_firm_name'))
                    <span class="text-danger">{{ $errors->first('leading_firm_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.leading_firm_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="share_value">{{ trans('cruds.jointVentureFirm.fields.share_value') }}</label>
                <input class="form-control {{ $errors->has('share_value') ? 'is-invalid' : '' }}" type="text" name="share_value" id="share_value" value="{{ old('share_value', $jointVentureFirm->share_value) }}">
                @if($errors->has('share_value'))
                    <span class="text-danger">{{ $errors->first('share_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jointVentureFirm.fields.share_value_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.joint-venture-firms.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $jointVentureFirm->id ?? 0 }}');
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