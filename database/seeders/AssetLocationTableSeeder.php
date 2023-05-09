<?php

namespace Database\Seeders;

use App\Models\AssetLocation;
use Illuminate\Database\Seeder;

class AssetLocationTableSeeder extends Seeder
{
    public function run()
    {
        $assetLocations = [
            [
                'id'         => 1,
                'name'       => 'CTP',
                'created_at' => '2023-03-13 05:59:31',
                'updated_at' => '2023-03-13 05:59:31',
            ],
            [
                'id'         => 2,
                'name'       => 'BITC',
                'created_at' => '2023-03-13 05:59:31',
                'updated_at' => '2023-03-13 05:59:31',
            ]
        ];

        AssetLocation::insert($assetLocations);
    }
}