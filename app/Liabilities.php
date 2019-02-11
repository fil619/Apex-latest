<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liabilities extends Model
{
  protected $fillable = [
     'name',
     'amount',
     'type'
 ];
}
