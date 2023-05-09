<?php

namespace App\Http\Requests;

use App\Models\Asset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_create');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'nullable',
                'integer',
            ],
            'serial_number' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'register' => [
                'string',
                'required',
            ],
            'merk' => [
                'string',
                'nullable',
            ],
            'ukuran' => [
                'string',
                'nullable',
            ],
            'bahan' => [
                'string',
                'nullable',
            ],
            'pemebelian' => [
                'string',
                'min:0',
                'max:4',
                'required',
            ],
            'perolehan' => [
                'string',
                'required',
            ],
            'photos' => [
                'array',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'harga' => [
                'nullable',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
            'sub_lokasi' => [
                'string',
                'nullable',
            ],
            'lantai' => [
                'string',
                'nullable',
            ],
            'perintah' => [
                'string',
                'nullable',
            ],
            'disposisi' => [
                'string',
                'nullable',
            ],
        ];
    }
}