<?php

namespace App\Http\Controllers\Admin;

use App\Cate;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $cates = Cate::orderBy('updated_at', 'desc')->paginate($perPage);
        $title = '分类管理';

        return view('admin.cate.index', compact('cates', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = '新建分类';

        return view('admin.cate.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        Cate::create([
            'title'       => $request->title,
            'description' => $request->description,
            'count'       => 0,
            'order'       => $request->order,
        ]);

        return redirect(route('admin.cate.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($cate)
    {
        $title = '编辑分类';

        return view('admin.cate.edit', compact('title', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cate)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $cate->title = $request->title;
        $cate->description = $request->description;
        $cate->order = $request->order;
        $cate->save();

        return redirect(route('admin.cate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cate $cate)
    {
        //
        $cate->delete();

        return redirect(route('admin.cate.index'));
    }
}
