<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = ['nama', 'harga_asli', 'harga_jual', 'satuan', 'deskripsi', 'gambar', 'perusahaan_id'];
}
