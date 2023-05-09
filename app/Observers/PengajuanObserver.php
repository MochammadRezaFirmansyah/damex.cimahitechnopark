<?php

namespace App\Observers;

use App\Models\Asset;
use App\Models\Pengajuan;

class PengajuanObserver
{
    public function created(Pengajuan $pengajuan)
    {
        if (auth()->check()) {
            $id = $pengajuan->asset_id;
            
            $asset = Asset::where('id', $id)->first();
            
            $asset->category_id = $asset->category_id;
            $asset->serial_number = $asset->serial_number;
            $asset->name = $asset->name;
            $asset->register = $asset->register;
            $asset->merk = $asset->merk;
            $asset->ukuran = $asset->ukuran;
            $asset->bahan = $asset->bahan;
            $asset->pemebelian = $asset->pemebelian;
            $asset->perolehan = $asset->perolehan;
            $asset->status_id = 4;
            $asset->location_id = $asset->location_id;
            $asset->sub_lokasi = $asset->sub_lokasi;
            $asset->lantai = $asset->lantai;
            $asset->penanggung_jawab = $asset->penanggung_jawab;
            $asset->perintah = $asset->perintah;
            $asset->disposisi = $asset->disposisi;

            $asset->save();
        }
    }
}
