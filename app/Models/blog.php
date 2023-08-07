<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $primaryKey = 'MaBaiViet';


    protected $fillable = 
    [    
        
        'MaBaiViet',
        "TenBaiViet" ,
        "NoiDung" ,
        "AnhMinhHoa" ,
        "NgayDang" ,
        "MaDanhMuc" ,
        "MaNguoiDung" ,
    ];

    public $timestamps = false;
}
