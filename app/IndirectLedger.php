<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class IndirectLedger extends Model
{
  protected $fillable = [
   'ledger',
                        ];
public $timestamps = false;
}
