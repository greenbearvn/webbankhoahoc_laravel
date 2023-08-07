<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = 
    [
        "id",
        "name",
        "email",
        "email_verified_at",
        "password",
        "role",
        "remember_token",
        "created_at",
    ];
    public $timestamps = false;
}
