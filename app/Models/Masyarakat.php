<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Masyarakat extends Authenticable
{
    use HasFactory;   

       

    protected $table = 'masyarakat';
    
    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'no_telp'
    ];
}
