@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.client.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <td>
                            {{ $client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.description') }}
                        </th>
                        <td>
                            {{ $client->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.client_code') }}
                        </th>
                        <td>
                            {{ $client->client_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.client_address') }}
                        </th>
                        <td>
                            {{ $client->client_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.contact_person') }}
                        </th>
                        <td>
                            {{ $client->contact_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.telephone_num') }}
                        </th>
                        <td>
                            {{ $client->telephone_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.city') }}
                        </th>
                        <td>
                            {{ $client->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.mou') }}
                        </th>
                        <td>
                            @if($client->mou)
                                <a href="{{ $client->mou->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection