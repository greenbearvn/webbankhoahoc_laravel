<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietbst extends Model
{
    use HasFactory;

    protected $table = 'chitietbst';
    protected $primaryKey = ['MaBST', 'MaKhoaHoc'];

    protected $fillable = [
        'MaBST',
        'MaKhoaHoc',
        'NgayThem'
    ];

    

    public $timestamps = false;

    public $incrementing = false;

}
