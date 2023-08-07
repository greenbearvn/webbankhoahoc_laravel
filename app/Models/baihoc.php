<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baihoc extends Model
{
    use HasFactory;
    protected $table = 'baihoc';
    protected $primaryKey = 'MaBaiHoc';


    protected $fillable = 
    [    
        'MaBaiHoc',
        'MaKhoaHoc' ,
        'TenBaiHoc' ,
        "ThoiGianHoanThanh" ,
    ];

    public $timestamps = false;
}
