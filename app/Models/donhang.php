<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\nguoidung;
use App\Models\chitietdonhang;

class donhang extends Model
{
    use HasFactory;

    protected $table = 'donhang';
    protected $primaryKey = 'MaDonHang';

    protected $fillable = 
    [    
        "MaDonHang",
        "MaNguoiDung",
        "NgayLap",
        "TinhTrang",
        "Tongtien"
    ];

    
    public $timestamps = false;
}
