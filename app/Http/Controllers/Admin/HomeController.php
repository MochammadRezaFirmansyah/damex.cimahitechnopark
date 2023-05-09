<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\AssetLocation;
use App\Models\AssetStatus;

class HomeController
{
    public function index()
    {
        $lokasi = AssetLocation::withCount('assets')->get();
        $status = AssetStatus::withCount('assets')->get();

        return view('home', compact('lokasi', 'status'));
    }

    public function show($name)
    {   
        $status = AssetStatus::where('name', $name)->first();
        $id = $status->id;
        $kategori = AssetCategory::withCount(['assets' => function ($query) use ($id) {
            $query->where('status_id', $id);
        }])->get();

        return view('home2', compact('kategori', 'name'));
    }

    public function detail ($name, $status)
    {

        $kategori = AssetCategory::where('name', $name)->first();
        $status = AssetStatus::where('name', $status)->first();
        $id = $kategori->id;
        $ids = $status->id;
        $assets = Asset::with(['category', 'status', 'location', 'media'])->where('category_id', $id)->where('status_id', $ids)->get();

        return view('details', compact('assets', 'name'));
    }
}
