<?php

namespace MVS;

use Illuminate\Database\Eloquent\Model;

class Kunden extends Model
{

  protected $fillable = [
      'vorname', 'nachname', 'user_id',
  ];


  public function myuser(){
    return $this->belongsTo('MVS\User','user_id');
  }
}
