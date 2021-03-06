<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;

    // 不允许集体赋值的字段
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.positions.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.positions.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
    }

    public function getLabelsButtonAttribute()
    {
        return '<a href="/admin/positions_labels/'.$this->id.'"
                 class="btn btn-success dropdown-item">绑定标签</a> ';
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
						  ' . $this->labels_button . '
			<div class="dropdown-menu" aria-labelledby="userActions">
			  ' . $this->delete_button . '
			</div>
		  </div>
		</div>';
    }

    public function parentPosition()
    {
        return $this->hasOne(Position::class, 'id', 'parent_id');
    }

    public function getNavShowCnAttribute()
    {
        return $this->nav_show === 1 ? '<span style="color: red;">展示</span>' : '不展示';
    }

    public function childPositions()
    {
        return $this->hasMany(Position::class, 'parent_id', 'id');
    }


    public function labels()
    {
        return $this->belongsToMany(
            Label::class,
            'position_rel_labels',
            'position_id', 'label_id'
        );
    }
}
