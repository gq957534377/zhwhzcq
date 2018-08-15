<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    // 不允许集体赋值的字段
    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
