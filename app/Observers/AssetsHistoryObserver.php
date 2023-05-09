<?php

namespace App\Observers;

use App\Models\Asset;
use App\Models\AssetsHistory;

class AssetsHistoryObserver
{
    public function updated(Asset $asset)
    {
        if (auth()->check()) {
            if ($asset->isDirty('location_id')) {
                AssetsHistory::create([
                    'asset_id'         => $asset->id,
                    'status_id'        => $asset->status_id,
                    'location_id'      => $asset->location_id,
                    'perintah'         => $asset->perintah,
                    'disposisi'        => $asset->disposisi,
                    'created_at'       => now('Asia/jakarta'),
                    'updated_at'       => now('Asia/jakarta'),
                ]);
            }
        }
    }
}
