<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    protected $table = 'traffics';

    protected $fillable = ['perusahaan_id', 'nama'];
}
