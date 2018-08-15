<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ArticleRequest;
use App\Models\Article;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * 说明: 文章管理列表页
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index(Request $request)
    {
        $where = [];

        $query = Article::where($where);

        if (!empty($request->title)) {
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate(15);
        return view('backend.article.index', ['articles' => $result]);
    }

    /**
     * 说明: 创建文章视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        $labels = Label::where(['stage' => 1])->get();

        return view('backend.article.create', ['labels' => $labels]);
    }

    /**
     * 说明: 添加文章
     *
     * @param ArticleRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function store(ArticleRequest $request)
    {
        Article::create([
            'title' => $request->title,
            'source' => $request->source,
            'banner' => $request->banner,
            'brief' => $request->brief,
            'url' => $request->url,
            'author' => $request->author,
            'sort' => $request->sort,
            'content' => $request->get('content'),
        ]);

        return redirect()->route('admin.articles.index')->withFlashSuccess('添加文章成功');
    }

    /**
     * 说明: 修改视图
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(Article $article)
    {
        $labels = Label::where(['stage' => 1])->get();
        return view('backend.article.edit', ['labels' => $labels, 'article' => $article]);
    }

    /**
     * 说明: 修改文章
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function update(Article $article, ArticleRequest $request)
    {
        Article::where(['id' => $article->id])->update([
            'title' => $request->title,
            'source' => $request->source,
            'banner' => $request->banner,
            'brief' => $request->brief,
            'url' => $request->url,
            'author' => $request->author,
            'sort' => $request->sort,
            'content' => $request->get('content'),
        ]);

        return redirect()->route('admin.articles.index')->withFlashSuccess('修改文章成功');
    }

    /**
     * 说明: 删除文章
     *
     * @param Article $article
     * @return mixed
     * @author 郭庆
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->withFlashSuccess('删除文章成功');
    }
}
