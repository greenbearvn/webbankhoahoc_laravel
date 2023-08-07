<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $table = 'khoahoc';
    protected $primaryKey = 'id';

    protected $fillable = 
    [
        "id",
        "TenKhoaHoc",
        "AnhKhoaHoc",
        "MoTaNgan",
        "MoTaDayDu",
        "ThoiGian",
        "LuotXem",
        "ThoiLuongKhoaHoc",
        "GiaCu",
        "GiamGia",
        "GiaMoi",
        "TrangThai",
        "MaCapDo", 
        "MaGiangVien",
        "MaDanhMuc"

    ];

    public function danhmuc()
    {
         return $this->belongsTo(danhmuc::class, 'MaDanhMuc');
    }

    public function giangvien()
    {
         return $this->belongsTo(giangvien::class, 'MaGiangVien');
    }
    public function capdo()
    {
         return $this->belongsTo(capdo::class, 'MaCapDo');
    }

    public $timestamps = false;
}
