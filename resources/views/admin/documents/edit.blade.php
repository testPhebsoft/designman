@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.document.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.documents.update", [$document->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="timesheet_id">{{ trans('cruds.document.fields.timesheet') }}</label>
                <select class="form-control select2 {{ $errors->has('timesheet') ? 'is-invalid' : '' }}" name="timesheet_id" id="timesheet_id">
                    @foreach($timesheets as $id => $entry)
                        <option value="{{ $id }}" {{ (old('timesheet_id') ? old('timesheet_id') : $document->timesheet->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('timesheet'))
                    <span class="text-danger">{{ $errors->first('timesheet') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.timesheet_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.document.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uploaded_by_id">{{ trans('cruds.document.fields.uploaded_by') }}</label>
                <select class="form-control select2 {{ $errors->has('uploaded_by') ? 'is-invalid' : '' }}" name="uploaded_by_id" id="uploaded_by_id">
                    @foreach($uploaded_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('uploaded_by_id') ? old('uploaded_by_id') : $document->uploaded_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('uploaded_by'))
                    <span class="text-danger">{{ $errors->first('uploaded_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.document.fields.uploaded_by_helper') }}</span>
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
    Dropzone.options.fileDropzone = {
    url: '{{ route('admin.documents.storeMedia') }}',
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
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->file)
      var file = {!! json_encode($document->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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