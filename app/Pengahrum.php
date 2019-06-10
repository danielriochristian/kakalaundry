<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengahrum extends Model
{
  protected $table = 'pengharum';

  public function Customer()
    {
      return $this->hasMany(Customer::class);
    }
}
