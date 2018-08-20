<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleRelLabel;
use App\Models\Banner;
use App\Models\Label;

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
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        // 导航
        $labels = Label::where(['stage' => 1])->orderBy('id')->get();
        // 新闻要点
        $newsPoints = $this->articlesByChannelId(3, 4);
        // 外宣媒体
        $newsOut = $this->articlesByChannelId(15, 4);
        // 实时要闻
        $newsTime = $this->articlesByChannelId(15, 4);
        // 本月焦点
        // 文化投资
        return view('frontend.index', ['labels' => $labels, 'banners' => $banners]);
    }

    private function articlesByChannelId($labelId, $num)
    {
        $articleIds = ArticleRelLabel::where('label_id', $labelId)
            ->pluck('article_id')
            ->toArray();

        return Article::whereIn('id', $articleIds)
            ->orderBy('sort', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take($num)
            ->get();
    }
}
