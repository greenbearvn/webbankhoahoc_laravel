<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KhoaHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'MaKhoaHoc' => 1,
            "TenKhoaHoc" => 'Lap Trinh Co Ban Voi Python',
            "AnhKhoaHoc" => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=989&q=80',
            "MoTaNgan" => 'TenKhoaHoc',
            "MoTaDayDu"=> 'TenKhoaHoc',
            "ThoiGian" => '2023-04-14',
            "LuotXem" => 0,
            "ThoiLuongKhoaHoc" => 'TenKhoaHoc',
            "GiaCu" => 15000,
            "GiamGia" => 100,
            "GiaMoi" => 15000,
            "TrangThai" => 1,
            "MaCapDo" => 1
        ]);
        
    }
}
