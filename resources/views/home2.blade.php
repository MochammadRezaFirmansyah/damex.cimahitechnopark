@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #5294D1">
                        Dashboard
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Berdasarkan Status : {{ $name }}</p>
                        <p>Kategori</p>
                        <div class="row justify-content-center align-items-center">
                            @foreach ($kategori as $item)
                                @php
                                    $colors = ['bg-blue', 'bg-yellow', 'bg-green', 'bg-aqua','bg-red'];
                                    $randomIndex = array_rand($colors);
                                    $randomColor = $colors[$randomIndex];
                                @endphp
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box {{ $randomColor }}">
                                        <div class="inner">
                                            <h3>{{ $item->assets_count }}</h3>

                                            <p>{{ $item->name }}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="{{ route('admin.details', ['name' => $item->name, 'status' => $name]) }}" class="small-box-footer">More info
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
