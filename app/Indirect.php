<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indirect extends Model
{
  protected $fillable = [
     'type',
     'amount',
     'date',
     'description',

 ];
}
