<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotAhp extends Model
{
    use HasFactory;
    protected $table='bobot_ahp';
    protected $fillable = [
        'id_kriteria1',
        'id_kriteria2',
        'skala_pembanding',
    ];
}
