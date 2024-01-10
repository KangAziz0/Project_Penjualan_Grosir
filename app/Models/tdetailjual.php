<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tdetailjual extends Model
{
    use HasFactory;
    protected $table = "tdetailjual";
    protected $fillable = [
        'qty'
    ];

    public function barang(){
        return $this->hasMany(Barang::class,'id_barang','id_barang');
    }

}
