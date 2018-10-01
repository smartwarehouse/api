<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialCategory extends Model
{
    protected $table = 'material_category';

    protected $fillable     = ['name','description'];
}
