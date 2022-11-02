<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    use HasFactory;
    protected $table='nilai_alternatif';
    protected $fillable = [
        'id_kriteria',
        'id_user',
        'nilai',
    ];
}
