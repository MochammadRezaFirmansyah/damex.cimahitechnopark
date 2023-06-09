@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah Perijinan
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.permissions.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label class="required" for="title">Title</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    value="{{ old('title', '') }}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
