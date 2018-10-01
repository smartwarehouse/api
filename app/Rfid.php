<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    protected $table = 'rfid';

    protected $fillable     = ['rfid_code'];
}
