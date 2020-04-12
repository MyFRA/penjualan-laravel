<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'Keranjang';

    protected $fillable = 
    [
    	'users_id',
    	'perusahaan_id',
    	'nama_pembeli',
    	'barang_id',
    	'status',
    	'traffics_id',
    	'jumlah',
    	'keuntungan',
        'harga_asli',
        'harga_jual',
    	'total_biaya',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
    ];
}
