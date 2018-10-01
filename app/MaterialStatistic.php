<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialStatistic extends Model
{
    protected $table = 'material_statistic';

    protected $fillable     = ['qty','type','user','material'];
}
