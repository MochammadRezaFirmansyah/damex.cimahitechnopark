<?php

namespace App\Http\Requests;

use App\Models\Pengajuan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UpdatePengajuanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengajuan_edit');
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