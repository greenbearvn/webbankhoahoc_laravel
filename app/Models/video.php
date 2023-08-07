<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $primaryKey = 'MaVideo';


    protected $fillable = 
    [    
        'MaVideo',
        'MaBaiHoc' ,
        'LinkVideo' ,
        "ThoiLuongVideo" ,
        "TinhTrang" ,
        "TenVideo" ,
        "NoiDungVideo"
    ];

    public $timestamps = false;
}
