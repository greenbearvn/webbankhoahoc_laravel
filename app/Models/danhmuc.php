<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'danhmuc';
    protected $primaryKey = 'madm';

    protected $fillable = 
    [
        "madm",
        "tendm",
        "anhdm"
    ];
    
    public $timestamps = false;
}
