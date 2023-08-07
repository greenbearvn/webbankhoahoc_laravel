<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bosuutap extends Model
{
    use HasFactory;

    protected $table = 'bosuutap';
    protected $primaryKey = 'MaBST';


    protected $fillable = ['MaBST', 'MaNguoiDung'];
    
    public $timestamps = false;
}
