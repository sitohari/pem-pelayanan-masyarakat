<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    use HasFactory;

    protected $table = 'respon';

    protected $primaryKey = 'id_respon';

    protected $fillable = [
        'id_pengaduan',
        'tgl_respon',
        'respon',
        'id_petugas',
    ];
}
