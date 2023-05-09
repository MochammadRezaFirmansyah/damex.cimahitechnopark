@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.pengajuan.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pengajuans.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengajuan.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $pengajuan->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengajuan.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $pengajuan->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengajuan.fields.asset') }}
                                    </th>
                                    <td>
                                        {{ $pengajuan->asset->serial_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Lokasi
                                    </th>
                                    <td>
                                        {{ $pengajuan->lokasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Sub Lokasi
                                    </th>
                                    <td>
                                        {{ $pengajuan->sub_lokasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Notes
                                    </th>
                                    <td>
                                        {{ $pengajuan->notes }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pengajuans.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection