@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.client.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $client->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_code">{{ trans('cruds.client.fields.client_code') }}</label>
                <input class="form-control {{ $errors->has('client_code') ? 'is-invalid' : '' }}" type="text" name="client_code" id="client_code" value="{{ old('client_code', $client->client_code) }}" required>
                @if($errors->has('client_code'))
                    <span class="text-danger">{{ $errors->first('client_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_address">{{ trans('cruds.client.fields.client_address') }}</label>
                <input class="form-control {{ $errors->has('client_address') ? 'is-invalid' : '' }}" type="text" name="client_address" id="client_address" value="{{ old('client_address', $client->client_address) }}">
                @if($errors->has('client_address'))
                    <span class="text-danger">{{ $errors->first('client_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.client_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person">{{ trans('cruds.client.fields.contact_person') }}</label>
                <input class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person', $client->contact_person) }}">
                @if($errors->has('contact_person'))
                    <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone_num">{{ trans('cruds.client.fields.telephone_num') }}</label>
                <input class="form-control {{ $errors->has('telephone_num') ? 'is-invalid' : '' }}" type="text" name="telephone_num" id="telephone_num" value="{{ old('telephone_num', $client->telephone_num) }}">
                @if($errors->has('telephone_num'))
                    <span class="text-danger">{{ $errors->first('telephone_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.telephone_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.client.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $client->city) }}" required>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mou">{{ trans('cruds.client.fields.mou') }}</label>
                <div class="needsclick dropzone {{ $errors->has('mou') ? 'is-invalid' : '' }}" id="mou-dropzone">
                </div>
                @if($errors->has('mou'))
                    <span class="text-danger">{{ $errors->first('mou') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.mou_helper') }}</span>
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
    Dropzone.options.mouDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="mou"]').remove()
      $('form').append('<input type="hidden" name="mou" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="mou"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($client) && $client->mou)
      var file = {!! json_encode($client->mou) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="mou" value="' + file.file_name + '">')
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