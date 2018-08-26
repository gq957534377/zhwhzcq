<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ArticleForAtlasRequest;
use App\Models\ArticleForAtlas;
use App\Models\ArticleHasAtlas;
use App\Models\ArticleHasLabel;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleForAtlasController extends Controller
{
    /**
     * 说明: 图集文章管理列表页
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index(Request $request)
    {
        $where = [];

        $query = ArticleForAtlas::where($where);

        if (!empty($request->title)) {
            $query = $query->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate(15)
            ->appends($request->all());

        return view('backend.article_atlas.index', ['articles' => $result]);
    }

    /**
     * 说明: 创建图集文章视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        $labels = Label::get();
        return view('backend.article_atlas.create', ['labels' => $labels]);
    }

    /**
     * 说明: 添加图集文章
     *
     * @param ArticleForAtlasRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function store(ArticleForAtlasRequest $request)
    {
        \DB::beginTransaction();
        try {
            $article = ArticleForAtlas::create([
                'title' => $request->title,
                'source' => $request->source,
                'brief' => $request->brief,
                'url' => $request->url,
                'author' => $request->author,
                'sort' => $request->sort??0,
            ]);

            foreach ($request->labels as $labelId) {
                ArticleHasLabel::create([
                    'article_id' => $article->id,
                    'label_id' => $labelId
                ]);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('admin.article_atlas.index')->withFlashDanger('添加图集文章失败' . $e->getMessage());
        }

        return redirect()->route('admin.article_atlas.index')->withFlashSuccess('添加图集文章成功');
    }

    /**
     * 说明: 修改视图
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit($id)
    {
        $article = ArticleForAtlas::findOrFail($id);
        $labels = Label::get();

        return view('backend.article_atlas.edit', ['labels' => $labels, 'article' => $article]);
    }

    /**
     * 说明: 修改图集文章
     *
     * @param $id
     * @param ArticleForAtlasRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function update($id, ArticleForAtlasRequest $request)
    {
        $article = ArticleForAtlas::findOrFail($id);

        \DB::beginTransaction();
        try {
            ArticleForAtlas::where(['id' => $article->id])->update([
                'title' => $request->title,
                'source' => $request->source,
                'brief' => $request->brief,
                'url' => $request->url,
                'author' => $request->author,
                'sort' => $request->sort??0,
            ]);

            ArticleHasLabel::whereIn('label_id', $article->labels->pluck('id')->toArray())
                ->where('article_id', $article->id)
                ->delete();
            foreach ($request->labels as $labelId) {
                ArticleHasLabel::create([
                    'article_id' => $article->id,
                    'label_id' => $labelId
                ]);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('admin.article_atlas.index')->withFlashDanger('添加图集文章失败' . $e->getMessage());
        }

        return redirect()->route('admin.article_atlas.index')->withFlashSuccess('修改图集文章成功');
    }

    /**
     * 说明: 删除图集文章
     *
     * @param $id
     * @author 郭庆
     */
    public function destroy($id)
    {
        $article = ArticleForAtlas::findOrFail($id);

        $article->delete();

        return redirect()->route('admin.article_atlas.index')->withFlashSuccess('删除图集文章成功');
    }
}
