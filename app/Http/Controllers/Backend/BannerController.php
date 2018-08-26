<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * 说明: 缩略图管理列表页
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function index(Request $request)
    {
        $result = Banner::orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate(15)
            ->appends($request->all());

        return view('backend.banner.index', ['banners' => $result]);
    }

    /**
     * 说明: 创建缩略图视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * 说明: 添加缩略图
     *
     * @param BannerRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function store(BannerRequest $request)
    {
        if ($request->hasFile('file')) {
            $request->file = Storage::url($request->file('file')->store('public/banners'));
        }
        Banner::create([
            'title' => $request->title,
            'file' => $request->file,
            'url' => $request->url,
            'sort' => $request->sort??0,
        ]);

        return redirect()->route('admin.banners.index')->withFlashSuccess('添加缩略图成功');
    }

    /**
     * 说明: 修改视图
     *
     * @param Banner $banner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', ['banner' => $banner]);
    }

    /**
     * 说明: 修改缩略图
     *
     * @param Banner $banner
     * @param BannerRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function update(Banner $banner, BannerRequest $request)
    {
        Banner::where(['id' => $banner->id])->update([
            'title' => $request->title,
            'file' => $request->file,
            'url' => $request->url,
            'sort' => $request->sort??0,
        ]);

        return redirect()->route('admin.banners.index')->withFlashSuccess('修改缩略图成功');
    }

    /**
     * 说明: 修改缩略图
     *
     * @param Banner $banner
     * @return mixed
     * @author 郭庆
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('admin.banners.index')->withFlashSuccess('删除缩略图成功');
    }
}
