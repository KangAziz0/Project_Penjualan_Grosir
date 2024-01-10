<?php 

function format_uang($angka){
 return  number_format($angka,0,',','.');
    
}

function tambah_nol_depan($value,$threshold = null){
    return sprintf("%0".$threshold."s",$value);
}