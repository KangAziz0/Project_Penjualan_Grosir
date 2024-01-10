<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model

{
    use LogsActivity;
    use HasFactory;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable('*');
        // Chain fluent methods for configuration options
    }
    protected $table = 'kategori';

    public function barang(){
        return $this->hasMany(Barang::class,'id_kategori','id_kategori');
    }
}
