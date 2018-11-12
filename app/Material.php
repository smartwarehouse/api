<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';

    protected $fillable     = [
        'material_code',
        'name',
        'price',
        'qty',
        'image',
        'rfid',
        'location',
        'material_category'
    ];
}
