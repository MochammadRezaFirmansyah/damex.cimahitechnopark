@extends('layouts.admin')
@section('content')
    <div class="content">
        @php
            $breadcrumbs = [['label' => 'Dashboard', 'url' => url('/admin')], ['label' => 'Asset', 'url' => url('/admin/assets')]];
        @endphp

        @include('partials.breadcrumb', ['breadcrumbs' => $breadcrumbs])
        @can('asset_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin.assets.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.asset.title_singular') }}
                    </a>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                        {{ trans('global.app_csvImport') }}
                    </button>
                    @include('csvImport.modal', [
                        'model' => 'Asset',
                        'route' => 'admin.assets.parseCsvImport',
                    ])
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('cruds.asset.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Asset">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.id') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.serial_number') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.name') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.register') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.merk') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.ukuran') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.bahan') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.pemebelian') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.perolehan') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.photos') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.status') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.harga') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.location') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.sub_lokasi') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.lantai') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.notes') }}
                                        </th>
                                        <th>
                                            {{ trans('cruds.asset.fields.assigned_to') }}
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assets as $key => $asset)
                                        <tr data-entry-id="{{ $asset->id }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $asset->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->serial_number ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->register ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->merk ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->ukuran ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->bahan ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->pemebelian ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->perolehan ?? '' }}
                                            </td>
                                            <td>
                                                @foreach ($asset->photos as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        {{ trans('global.view_file') }}
                                                    </a>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $asset->status->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->harga ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->location->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->sub_lokasi ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->lantai ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->notes ?? '' }}
                                            </td>
                                            <td>
                                                {{ $asset->penanggung_jawab ?? '' }}
                                            </td>
                                            <td>
                                                @can('asset_show')
                                                    <a class="btn btn-xs btn-primary"
                                                        href="{{ route('admin.assets.show', $asset->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                @can('asset_edit')
                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.assets.edit', $asset->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endcan

                                                @can('asset_delete')
                                                    <form action="{{ route('admin.assets.destroy', $asset->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger"
                                                            value="{{ trans('global.delete') }}">
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
            @can('asset_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.assets.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
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
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0,
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Asset:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
