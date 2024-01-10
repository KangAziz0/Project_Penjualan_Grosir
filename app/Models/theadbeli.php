<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theadbeli extends Model
{
    use HasFactory;

    protected $table = 'theadbeli';
    protected $fillable = [
        'notrans','tanggal','id_suplier','totalitem','totalharga','totalbayar'
    ];

    public function suplier(){
        return $this->hasOne(Suplier::class,'id','id_suplier');
    }

    public function tdetail(){
        return $this->hasMany(tdetailbeli::class,'notrans','notrans');
    }
}
