<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
  public $timestamps = false;
  public function role()
  {
    return $this->belongsTo(Pengharum::class,'nama_pengharum',JenisPakaian::class,'jenis_pakaian');
  }
}
