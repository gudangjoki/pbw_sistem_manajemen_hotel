<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'hall';

    // Define the primary key
    protected $primaryKey = 'id';

    // Define the fillable attributes
    protected $fillable = [
        'nama_ruangan',
        'jenis_ruangan',
        'fasilitas',
        'harga',
        'gambar',
        'deskripsi',
        'status'
    ];

    // Define any relationships if necessary (optional)
    // public function someRelation()
    // {
    //     return $this->hasMany(SomeModel::class);
    // }
}
