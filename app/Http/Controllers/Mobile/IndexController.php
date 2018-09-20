<?php
/**
 * Created by PhpStorm.
 * User: lindowx
 * Date: 2018/9/14
 * Time: 17:45
 */
namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleRelLabel;
use App\Models\Banner;
use App\Models\Position;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private function articlesByPositionId($positionId, $num)
    {
        $position = Position::find($positionId);
        if (empty($position)) return [];

        $lableIds = $position->labels->pluck('id')->unique()->toArray();
        $articleIds = ArticleRelLabel::whereIn('label_id', $lableIds)
            ->pluck('article_id')
            ->toArray();
        $articleIds = array_keys(array_count_values($articleIds), count($lableIds));

        return Article::whereIn('id', $articleIds)
            ->orderBy('sort', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->take($num)
            ->get();
    }

    public function index()
    {
        $viewData = [
            'news_list' => [
                //新闻要点:6
                'news_points'            => $this->articlesByPositionId(41, 6),

                //外宣媒体:4
                'news_out'               => $this->articlesByPositionId(15, 4),

                //专题活动:4
                'thematic_activities'    => $this->articlesByPositionId(7, 4),

            ],

            //焦点图
            'banners'               => Banner::orderBy('sort', 'desc')
                ->orderBy('sort', 'desc')
                ->take(4)
                ->get(),

        ];

        return view('mobile.index', $viewData);
    }
}