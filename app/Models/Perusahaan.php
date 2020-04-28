<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = ['nama', 'token', 'slogan', 'logo', 'telp', 'email', 'fax', 'site', 'facebook', 'instagram', 'alamat', 'deskripsi', 'sejarah'];

}
