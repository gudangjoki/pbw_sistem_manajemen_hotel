<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kamar';

    protected $table = 'kamar';

    protected $fillable = [
        'id_kamar',
        'nomor_kamar',
        'tipe_kamar',
        'harga_kamar',
        'deskripsi',
        'status_kamar',
    ];
}
