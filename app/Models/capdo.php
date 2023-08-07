<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capdo extends Model
{
    use HasFactory;
    protected $table = 'capdo';
    protected $primaryKey = 'MaCapDo';

    protected $fillable = 
    [    
        "MaCapDo",
        "TenCapDo"
    ];

    public function khoahoc()
    {
         return $this->hasOne(khoahoc::class, 'MaKhoaHoc');
    }

    public $timestamps = false;
}
