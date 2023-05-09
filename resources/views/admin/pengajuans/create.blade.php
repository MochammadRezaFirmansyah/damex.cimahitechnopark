@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.pengajuan.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.pengajuans.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.pengajuan.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pengajuan.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('asset') ? 'has-error' : '' }}">
                            <label class="required" for="asset_id">{{ trans('cruds.pengajuan.fields.asset') }}</label>
                            <select class="form-control select2" name="asset_id" id="asset_id" required>
                                @foreach($assets as $id => $entry)
                                    <option value="{{ $id }}" {{ old('asset_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asset'))
                                <span class="help-block" role="alert">{{ $errors->first('asset') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pengajuan.fields.asset_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lokasi') ? 'has-error' : '' }}">
                            <label class="required" for="lokasi">Lokasi</label>
                            <input class="form-control" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', '') }}" required>
                            @if($errors->has('lokasi'))
                                <span class="help-block" role="alert">{{ $errors->first('lokasi') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('sub_lokasi') ? 'has-error' : '' }}">
                            <label for="sub_lokasi">Sub Lokasi</label>
                            <input class="form-control" type="text" name="sub_lokasi" id="sub_lokasi" value="{{ old('sub_lokasi', '') }}">
                            @if($errors->has('sub_lokasi'))
                                <span class="help-block" role="alert">{{ $errors->first('sub_lokasi') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection