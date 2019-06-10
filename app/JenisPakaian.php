<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPakaian extends Model
{
  protected $table = 'jenis_pakaian';

  public function Customer()
    {
      return $this->hasMany(Customer::class);
    }
}
