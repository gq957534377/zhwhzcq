<?php

namespace App\Http\Controllers\Backend;

use App\Models\ArticleForAtlas;
use App\Models\ArticleHasAtlas;
use App\Models\Atlas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleHasAtlasController extends Controller
{
    private $article = null;

    public function __construct(Request $request)
    {
        if (empty($request->article_id) || empty($article = ArticleForAtlas::find($request->article_id))) abort('404');
        $this->article = $article;
    }

    /**
     * 说明: 图集管理列表页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index()
    {
        $atlasIds = $this->article->atlas->pluck('id')->toArray();
        $result = Atlas::whereIn('id', $atlasIds)
            ->orderBy('sort', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(15)
            ->appends(['article_id' => $this->article->id]);

        return view('backend.atlas.index', ['atlases' => $result]);
    }

    /**
     * 说明: 创建图集视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        return view('backend.atlas.create', ['article_id' => $this->article->id]);
    }

    /**
     * 说明: 添加图集
     *
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            $atlas = Atlas::create([
                'brief' => $request->brief,
                'banner' => $request->banner,
                'url' => $request->url,
                'sort' => $request->sort??0,
            ]);

            ArticleHasAtlas::create([
                'atlas_id' => $atlas->id,
                'article_id' => $this->article->id
            ]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('admin.article_has_atlas.index', ['article_id' => $this->article->id])->withFlashDanger('绑定图集失败' . $e->getMessage());
        }

        return redirect()->route('admin.article_has_atlas.index', ['article_id' => $this->article->id])->withFlashSuccess('添加图集成功');
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
        $atlas=Atlas::findOrFail($id);
        return view('backend.atlas.edit', ['atlas' => $atlas]);
    }

    /**
     * 说明: 修改图集
     *
     * @param $id
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function update($id, Request $request)
    {
        $atlas=Atlas::findOrFail($id);

        Atlas::where(['id' => $atlas->id])->update([
            'brief' => $request->brief,
            'banner' => $request->banner,
            'url' => $request->url,
            'sort' => $request->sort??0,
        ]);

        return redirect()->route('admin.article_has_atlas.index', ['article_id' => $this->article->id])->withFlashSuccess('修改图集成功');
    }

    /**
     * 说明: 删除图集
     *
     * @param $id
     * @return mixed
     * @author 郭庆
     */
    public function destroy($id)
    {
        $atlas=Atlas::findOrFail($id);
        $atlas->delete();

        return redirect()->route('admin.article_has_atlas.index', ['article_id' => $this->article->id])->withFlashSuccess('删除图集成功');
    }
}
