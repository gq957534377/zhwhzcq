<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleForAtlas extends Model
{
    use SoftDeletes;
    // 不允许集体赋值的字段
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.article_atlas.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.article_atlas.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
    }

    public function getAtlasButtonAttribute()
    {
        return '<a href="/admin/article_has_atlas?article_id='.$this->id.'" class="btn btn-success dropdown-item">设置图集</a> ';
    }


    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  ' . $this->edit_button . '
		
		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
						  ' . $this->atlas_button . '
			<div class="dropdown-menu" aria-labelledby="userActions">
			  ' . $this->delete_button . '
			</div>
		  </div>
		</div>';
    }

    public function Atlas()
    {
        return $this->belongsToMany(
            Atlas::class,
            'article_has_atlas',
            'article_id', 'atlas_id'
        );
    }

    public function labels()
    {
        return $this->belongsToMany(
            Label::class,
            'article_has_labels',
            'article_id', 'label_id'
        );
    }
}
