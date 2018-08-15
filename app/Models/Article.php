<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    // 不允许集体赋值的字段
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $appends=['banner_url'];

    /**
     * 说明: 返回轮播图拼装好的地址
     *
     * @return mixed
     * @author 郭庆
     */
    public function getBannerUrlAttribute()
    {
        return $this->banner;
    }
}
