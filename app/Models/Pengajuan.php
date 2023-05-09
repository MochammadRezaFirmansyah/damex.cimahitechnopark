<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pengajuans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'asset_id',
        'lokasi',
        'sub_lokasi',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\PengajuanObserver);
    }
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}