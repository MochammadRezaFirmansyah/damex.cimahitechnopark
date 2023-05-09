<?php

namespace Database\Seeders;

use App\Models\AssetStatus;
use Illuminate\Database\Seeder;

class AssetStatusTableSeeder extends Seeder
{
    public function run()
    {
        $assetStatuses = [
            [
                'id'         => 1,
                'name'       => 'Bagus',
                'created_at' => '2023-03-13 05:59:31',
                'updated_at' => '2023-03-13 05:59:31',
            ],
            [
                'id'         => 2,
                'name'       => 'Perlu Perbaikan',
                'created_at' => '2023-03-13 05:59:31',
                'updated_at' => '2023-03-13 05:59:31',
            ],
            [
                'id'         => 3,
                'name'       => 'Rusak Berat',
                'created_at' => '2023-03-13 05:59:31',
                'updated_at' => '2023-03-13 05:59:31',
            ],
            [
                'id'         => 4,
                'name'       => 'Sedang Di Perbaiki',
                'created_at' => '2023-03-13 05:59:31',
                'updated_at' => '2023-03-13 05:59:31',
            ],
        ];

        AssetStatus::insert($assetStatuses);
    }
}