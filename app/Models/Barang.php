<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model

{

    use HasFactory;
    protected $table = 'tbarang';
    protected $primaryKey = 'id_barang';
    public function kategori()
    {
        return $this->hasOne(kategori::class, 'id_kategori', 'id_kategori');
    }
}
