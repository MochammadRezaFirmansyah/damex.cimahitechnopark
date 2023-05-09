@extends('layouts.admin')
@section('content')
    <div class="content">
        @php
            $breadcrumbs = [
                ['label' => 'Dashboard', 'url' => url('/admin')],
                ['label' => 'IZin', 'url' => url('/admin/permissions')],
            ];
        @endphp

        @include('partials.breadcrumb', ['breadcrumbs' => $breadcrumbs])
        @can('permission_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                        Tambah Perijinan
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Perijinan
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $key => $permission)
                                        <tr data-entry-id="{{ $permission->id }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $permission->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $permission->title ?? '' }}
                                            </td>
                                            <td>
                                                @can('permission_show')
                                                    <a class="btn btn-xs btn-primary"
                                                        href="{{ route('admin.permissions.show', $permission->id) }}">
                                                        Lihat
                                                    </a>
                                                @endcan

                                                @can('permission_edit')
                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                        Ubah
                                                    </a>
                                                @endcan

                                                @can('permission_delete')
                                                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger" value="Hapus">
                                                    </form>
                                                @endcan

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('permission_delete')
                let deleteButtonTrans = 'Hapus Data Terpilih'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.permissions.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('Tidak ada data yang dipilih!')

                            return
                        }

                        if (confirm('Apakah Anda Yakin?')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
