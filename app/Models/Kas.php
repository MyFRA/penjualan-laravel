<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
   protected $table = 'kas';

   protected $fillable = ['perusahaan_id', 'kas', 'pesan'];
}
