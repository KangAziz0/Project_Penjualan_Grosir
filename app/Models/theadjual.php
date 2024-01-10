<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theadjual extends Model
{
    use HasFactory;
    protected $table = "theadjual";
    
    public function petugas(){
        return $this->hasOne(User::class,'id','kode_petugas');
}
    public function tdetailjual(){
        return $this->hasMany(tdetailjual::class,'Notrans','notrans');
    }
}
