<?php

namespace register;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
  protected $table = 'people';
  public $timestamps = false;

  protected $fillable = array('firstName',
    'lastName', 'age', 'dateBirthday', 'email');
}
