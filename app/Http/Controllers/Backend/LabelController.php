<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\LabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    public function index(Request $request)
    {
        $where = [];
        $query = Label::where($where);

        if (!empty($request->name)) {
            $query = $query->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->appends($request->all());
        return view('backend.label.index', ['labels' => $result]);
    }

    /**
     * 说明: 创建标签视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function create()
    {
        return view('backend.label.create');
    }

    /**
     * 说明: 添加标签
     *
     * @param LabelRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function store(LabelRequest $request)
    {
        Label::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.labels.index')->withFlashSuccess(__('alerts.backend.labels.created'));
    }

    /**
     * 说明: 修改视图
     *
     * @param Label $label
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 郭庆
     */
    public function edit(Label $label)
    {
        return view('backend.label.edit', ['label' => $label]);
    }

    /**
     * 说明: 修改标签
     *
     * @param Label $label
     * @param LabelRequest $request
     * @return mixed
     * @author 郭庆
     */
    public function update(Label $label,LabelRequest $request)
    {
        Label::where(['id'=>$label->id])->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.labels.index')->withFlashSuccess(__('alerts.backend.labels.updated'));
    }

    /**
     * 说明: 删除标签
     *
     * @param Label $label
     * @return mixed
     * @author 郭庆
     */
    public function destroy(Label $label)
    {
        $label->delete();

        return redirect()->route('admin.labels.index')->withFlashSuccess(__('alerts.backend.labels.deleted'));
    }
}
