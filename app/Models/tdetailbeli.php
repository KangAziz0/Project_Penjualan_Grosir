<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tdetailbeli extends Model
{
    use HasFactory;
    protected $table = 'tdetailbeli';

    protected $fillable = [
        'notrans','harga_beli','qty','subtotal'
    ];
    
    public function barang(){
        return $this->hasMany(Barang::class,'id_barang','id_barang');
    }
}
