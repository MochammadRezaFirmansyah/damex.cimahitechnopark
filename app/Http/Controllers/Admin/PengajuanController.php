<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPengajuanRequest;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use App\Models\Asset;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PengajuanController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pengajuan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuans = Pengajuan::with(['asset'])->get();

        return view('admin.pengajuans.index', compact('pengajuans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pengajuan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::pluck('serial_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pengajuans.create', compact('assets'));
    }

    public function store(StorePengajuanRequest $request)
    {
        $pengajuan = Pengajuan::create($request->all());

        return redirect()->route('admin.pengajuans.index');
    }

    public function edit(Pengajuan $pengajuan)
    {
        abort_if(Gate::denies('pengajuan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::pluck('serial_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pengajuan->load('asset');

        return view('admin.pengajuans.edit', compact('assets', 'pengajuan'));
    }

    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        $pengajuan->update($request->all());

        return redirect()->route('admin.pengajuans.index');
    }

    public function show(Pengajuan $pengajuan)
    {
        abort_if(Gate::denies('pengajuan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuan->load('asset');

        return view('admin.pengajuans.show', compact('pengajuan'));
    }

    public function destroy(Pengajuan $pengajuan)
    {
        abort_if(Gate::denies('pengajuan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengajuanRequest $request)
    {
        $pengajuans = Pengajuan::find(request('ids'));

        foreach ($pengajuans as $pengajuan) {
            $pengajuan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}