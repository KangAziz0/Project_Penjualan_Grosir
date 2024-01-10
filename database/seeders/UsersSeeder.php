<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'kode_petugas' => 'P0001',
                'nama_petugas'=>'Abdul',
                'jenis_kelamin'=>'Laki-laki',
                'Alamat' => 'Bandung',
                'role'=>'Admin',
                'agama'=> 'Islam',
                'no_telepon' => 832732093,
                'password'=> bcrypt('123456')
            ],
            // [
            //     'kode_petugas'=> '2',
            //     'name'=>'Petugas',
            //     'email'=>'Petugas123@gmail.com',
            //     'role'=>'Petugas',
            //     'password'=> bcrypt('654321')
            // ]
        ];

        foreach($userdata as $data=>$val){
            User::create($val);
        }
    }
}
