<?php

namespace App\Http\Requests;

use App\Models\Pengajuan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StorePengajuanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengajuan_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'asset_id' => [
                'required',
                'integer',
            ],
            'lokasi' => [
                'string',
                'required',
            ],
            'sub_lokasi' => [
                'string',
                'nullable',
            ],
        ];
    }
}