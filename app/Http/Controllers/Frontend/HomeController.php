<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleRelLabel;
use App\Models\Banner;
use App\Models\Label;
use App\Models\Position;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 获取轮播图
        $banners = Banner::orderBy('sort', 'desc')
            ->orderBy('sort', 'desc')
            ->take(4)
            ->get();

        // 导航
        $labels = Position::where(['stage' => 1, 'nav_show' => 1])
            ->orderBy('sort', 'asc')
            ->take(16)
            ->get();

        // 新闻要点
        $newsPoints = $this->articlesByPositionId(41, 8);
        // 外宣媒体
        $newsOut = $this->articlesByPositionId(15, 4);
        // 专题活动
        $thematicActivities = $this->articlesByPositionId(7, 4);
        // 实时要闻
        $newsTime = $this->articlesByPositionId(42, 5);
        // 本月焦点
        $monthPoints = $this->articlesByPositionId(43, 1);
        // 文化投资
        $culturalInvestment = $this->articlesByPositionId(44, 4);

        return view('frontend.index', [
            'labels' => $labels,
            'banners' => $banners,
            'newsPoints' => $newsPoints,
            'newsOut' => $newsOut,
            'thematicActivities' => $thematicActivities,
            'newsTime' => $newsTime,
            'monthPoints' => $monthPoints,
            'culturalInvestment' => $culturalInvestment,
        ]);
    }

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
}
