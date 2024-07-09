<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKamar extends Model
{
    protected $table = 'kategori_kamar';

    // Definisikan relasi jika diperlukan
    public function kamars()
    {
        return $this->hasMany(Kamar::class, 'id_tipe_kamar', 'id');
    }
}
