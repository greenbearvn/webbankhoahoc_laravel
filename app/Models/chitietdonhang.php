<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhoaHoc;

class chitietdonhang extends Model
{
    use HasFactory;

    protected $table = 'chitietdonhang';
    protected $primaryKey = ['MaDonHang', 'MaKhoaHoc'];

    protected $fillable = 
    [
        "MaDonHang",
        "MaKhoaHoc",
        "MaGiangVien",
        "Gia"
    ];

    public function product()
    {
        return $this->belongsTo(KhoaHoc::class, 'id');
    }

    public $timestamps = false;
    public $incrementing = false;
}
