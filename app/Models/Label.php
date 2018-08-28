<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use SoftDeletes;

    // 不允许集体赋值的字段
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.labels.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    public function getDeleteButtonAttribute()
    {
            return '<a href="' . route('admin.labels.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
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
			<div class="dropdown-menu" aria-labelledby="userActions">
			  ' . $this->delete_button . '
			</div>
		  </div>
		</div>';
    }

    /**
     * 说明:  获取同时打了多个标签下的文章
     *
     * @param array $labels
     * @param null $model_type
     * @return mixed
     * @author 郭庆
     */
    public static function articles(Array $labels, $model_type = null, $paginate = null)
    {
        $labels = array_unique($labels);
        if (empty($model_type)) {
            $articleRelLabels = ArticleRelLabel::whereIn('label_id', $labels)->get();
            $model_types = $articleRelLabels->groupBy('model_type');
            return $model_types->map(function ($articles, $model_type) {
                $articlesIds = $articles->pluck('model_id')->toArray();
                $ids = [];
                $counts = array_count_values($articlesIds);
                foreach ($counts as $tempId => $n) {
                    if ($n == count($counts)) $ids[] = $tempId;
                }
                return app($model_type)->find($ids);
            });
        }
        $articlesIds = ArticleRelLabel::whereIn('label_id', $labels)
            ->where(['model_type' => $model_type])
            ->pluck('model_id')
            ->toArray();
        $ids = [];
        $counts = array_count_values($articlesIds);
        foreach ($counts as $tempId => $n) {
            if ($n == count($labels)) $ids[] = $tempId;
        }
        if (empty($paginate))
            return app($model_type)->find($ids);
        return app($model_type)->whereIn('guid', $ids)->paginate($paginate);
    }
}
