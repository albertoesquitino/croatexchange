<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
  protected $table = 'buy';

  protected $fillable = [
      'username', 'price', 'minimum'
  ];
}
