<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suplier extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'tsuplier';
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable('*');
        // Chain fluent methods for configuration options
    }

    protected $fillable = [
        'kode_suplier', 'nama_suplier', 'alamat', 'no_telepon'
    ];
}
