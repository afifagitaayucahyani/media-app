<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'mahasiswa_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'judul_penelitian',
        'tahun_terbit',
        'link_media',
        'gambar_cover',
    ];
}
