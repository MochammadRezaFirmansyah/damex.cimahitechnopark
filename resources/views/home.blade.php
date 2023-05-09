@extends('layouts.admin')
@section('content')
    <div class="content">
        @php
            $breadcrumbs = [['label' => 'Dashboard', 'url' => url('/admin')]];
        @endphp

        @include('partials.breadcrumb', ['breadcrumbs' => $breadcrumbs])
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
                        <p>Location</p>
                        <div class="row justify-content-center align-items-center">
                            @php
                                $colors = ['bg-blue', 'bg-yellow'];
                                $randomIndex = array_rand($colors);
                                $randomColor = $colors[$randomIndex];
                            @endphp
                            @foreach ($lokasi as $item)
                                <div class="col-md-offset-1 col-md-4">
                                    <div class="info-box {{ $randomColor }} text-center">
                                        <div class="d-flex align-items-center">
                                            </br>
                                            <span class="info-box-number">{{ $item->assets_count }}</span>
                                            <span class="info-box-text">{{ $item->name }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            @endforeach
                        </div>

                        <p>Status</p>
                        <div class="row justify-content-center align-items-center">
                            @foreach ($status as $item)
                                @php
                                    $colors = ['bg-aqua', 'bg-olive', 'bg-light-blue'];
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
                                        <a href="{{ route('admin.home2', $item->name) }}" class="small-box-footer">More info
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
