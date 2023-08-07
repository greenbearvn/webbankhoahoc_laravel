<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giangvien extends Model
{
    use HasFactory;
    protected $table = 'giangvien';
    protected $primaryKey = 'MaGiangVien';

    protected $fillable = 
    [            
    
        "MaGiangVien",
        "TenGiangVien",
        "Email",
        "SoDienThoai",
        "AnhDaiDien",
        "MoTa",
        "MaDanhMuc"
       
    ];
    public function user()
    {
         return $this->belongsTo(User::class, 'MaNguoiDung');
    }

    public $timestamps = false;
}
