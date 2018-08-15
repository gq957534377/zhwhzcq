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
        if (!empty($request->parent_id)) {
            $where['parent_id'] = $request->parent_id;
        }
        if (!empty($request->stage)) {
            $where['stage'] = $request->stage;
        }
        $query = Label::where($where);

        if (!empty($request->name)) {
            $query = $query->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $query
            ->orderBy('updated_at', 'desc')
            ->orderBy('stage', 'asc')
            ->paginate(15);
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
        $labels = Label::where(['stage' => 1])->get();

        return view('backend.label.create', ['labels' => $labels]);
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
            'stage' => $request->stage,
            'parent_id' => $request->parent_id,
            'nav_show' => $request->nav_show,
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
        $parents = Label::where(['stage' => 1])->get();
        return view('backend.label.edit', ['label' => $label, 'parents' => $parents]);
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
            'stage' => $request->stage,
            'parent_id' => $request->parent_id,
            'nav_show' => $request->nav_show,
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
