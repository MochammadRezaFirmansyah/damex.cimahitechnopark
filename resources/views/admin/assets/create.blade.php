@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.asset.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.assets.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label for="category_id">{{ trans('cruds.asset.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="help-block" role="alert">{{ $errors->first('category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('serial_number') ? 'has-error' : '' }}">
                            <label class="required" for="serial_number">{{ trans('cruds.asset.fields.serial_number') }}</label>
                            <input class="form-control" type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', '') }}" required>
                            @if($errors->has('serial_number'))
                                <span class="help-block" role="alert">{{ $errors->first('serial_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.serial_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.asset.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('register') ? 'has-error' : '' }}">
                            <label class="required" for="register">{{ trans('cruds.asset.fields.register') }}</label>
                            <input class="form-control" type="text" name="register" id="register" value="{{ old('register', '') }}" required>
                            @if($errors->has('register'))
                                <span class="help-block" role="alert">{{ $errors->first('register') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.register_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('merk') ? 'has-error' : '' }}">
                            <label for="merk">{{ trans('cruds.asset.fields.merk') }}</label>
                            <input class="form-control" type="text" name="merk" id="merk" value="{{ old('merk', '') }}">
                            @if($errors->has('merk'))
                                <span class="help-block" role="alert">{{ $errors->first('merk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.merk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ukuran') ? 'has-error' : '' }}">
                            <label for="ukuran">{{ trans('cruds.asset.fields.ukuran') }}</label>
                            <input class="form-control" type="text" name="ukuran" id="ukuran" value="{{ old('ukuran', '') }}">
                            @if($errors->has('ukuran'))
                                <span class="help-block" role="alert">{{ $errors->first('ukuran') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.ukuran_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bahan') ? 'has-error' : '' }}">
                            <label for="bahan">{{ trans('cruds.asset.fields.bahan') }}</label>
                            <input class="form-control" type="text" name="bahan" id="bahan" value="{{ old('bahan', '') }}">
                            @if($errors->has('bahan'))
                                <span class="help-block" role="alert">{{ $errors->first('bahan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.bahan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pemebelian') ? 'has-error' : '' }}">
                            <label class="required" for="pemebelian">{{ trans('cruds.asset.fields.pemebelian') }}</label>
                            <input class="form-control" type="text" name="pemebelian" id="pemebelian" value="{{ old('pemebelian', '') }}" required>
                            @if($errors->has('pemebelian'))
                                <span class="help-block" role="alert">{{ $errors->first('pemebelian') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.pemebelian_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('perolehan') ? 'has-error' : '' }}">
                            <label class="required" for="perolehan">{{ trans('cruds.asset.fields.perolehan') }}</label>
                            <input class="form-control" type="text" name="perolehan" id="perolehan" value="{{ old('perolehan', '') }}" required>
                            @if($errors->has('perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.asset.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required" for="status_id">{{ trans('cruds.asset.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
                            <label class="required" for="harga">{{ trans('cruds.asset.fields.harga') }}</label>
                            <input class="form-control" type="number" name="harga" id="harga" value="{{ old('harga', '') }}" step="0.01" required>
                            @if($errors->has('harga'))
                                <span class="help-block" role="alert">{{ $errors->first('harga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.harga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label class="required" for="location_id">{{ trans('cruds.asset.fields.location') }}</label>
                            <select class="form-control select2" name="location_id" id="location_id" required>
                                @foreach($locations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('location_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('location'))
                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sub_lokasi') ? 'has-error' : '' }}">
                            <label for="sub_lokasi">{{ trans('cruds.asset.fields.sub_lokasi') }}</label>
                            <input class="form-control" type="text" name="sub_lokasi" id="sub_lokasi" value="{{ old('sub_lokasi', '') }}">
                            @if($errors->has('sub_lokasi'))
                                <span class="help-block" role="alert">{{ $errors->first('sub_lokasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.sub_lokasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lantai') ? 'has-error' : '' }}">
                            <label for="lantai">{{ trans('cruds.asset.fields.lantai') }}</label>
                            <input class="form-control" type="text" name="lantai" id="lantai" value="{{ old('lantai', '') }}">
                            @if($errors->has('lantai'))
                                <span class="help-block" role="alert">{{ $errors->first('lantai') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.lantai_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                            <label for="notes">{{ trans('cruds.asset.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('assigned_to') ? 'has-error' : '' }}">
                            <label for="assigned_to_id">{{ trans('cruds.asset.fields.assigned_to') }}</label>
                            <input class="form-control" type="text" name="penanggung_jawab" id="penanggung_jawab" value="{{ old('penanggung_jawab', '') }}">
                            @if($errors->has('assigned_to'))
                                <span class="help-block" role="alert">{{ $errors->first('assigned_to') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.assigned_to_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('perintah') ? 'has-error' : '' }}">
                            <label for="perintah">{{ trans('cruds.asset.fields.perintah') }}</label>
                            <input class="form-control" type="text" name="perintah" id="perintah" value="{{ old('perintah', '') }}">
                            @if($errors->has('perintah'))
                                <span class="help-block" role="alert">{{ $errors->first('perintah') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.perintah_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('disposisi') ? 'has-error' : '' }}">
                            <label for="disposisi">{{ trans('cruds.asset.fields.disposisi') }}</label>
                            <input class="form-control" type="text" name="disposisi" id="disposisi" value="{{ old('disposisi', '') }}">
                            @if($errors->has('disposisi'))
                                <span class="help-block" role="alert">{{ $errors->first('disposisi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.disposisi_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.assets.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($asset) && $asset->photos)
          var files =
            {!! json_encode($asset->photos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
            }
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