@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subcontractor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subcontractors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.subcontractor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.subcontractor.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.subcontractor.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contract_person">{{ trans('cruds.subcontractor.fields.contract_person') }}</label>
                <input class="form-control {{ $errors->has('contract_person') ? 'is-invalid' : '' }}" type="text" name="contract_person" id="contract_person" value="{{ old('contract_person', '') }}" required>
                @if($errors->has('contract_person'))
                    <span class="text-danger">{{ $errors->first('contract_person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.contract_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.subcontractor.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.subcontractor.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agreement">{{ trans('cruds.subcontractor.fields.agreement') }}</label>
                <div class="needsclick dropzone {{ $errors->has('agreement') ? 'is-invalid' : '' }}" id="agreement-dropzone">
                </div>
                @if($errors->has('agreement'))
                    <span class="text-danger">{{ $errors->first('agreement') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.agreement_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="assignment_value">{{ trans('cruds.subcontractor.fields.assignment_value') }}</label>
                <input class="form-control {{ $errors->has('assignment_value') ? 'is-invalid' : '' }}" type="text" name="assignment_value" id="assignment_value" value="{{ old('assignment_value', '') }}">
                @if($errors->has('assignment_value'))
                    <span class="text-danger">{{ $errors->first('assignment_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subcontractor.fields.assignment_value_helper') }}</span>
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
    Dropzone.options.agreementDropzone = {
    url: '{{ route('admin.subcontractors.storeMedia') }}',
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
      $('form').find('input[name="agreement"]').remove()
      $('form').append('<input type="hidden" name="agreement" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="agreement"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($subcontractor) && $subcontractor->agreement)
      var file = {!! json_encode($subcontractor->agreement) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="agreement" value="' + file.file_name + '">')
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