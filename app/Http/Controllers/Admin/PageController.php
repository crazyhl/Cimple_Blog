<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $pages = Page::pages()->paginate($perPage);
        $title = '页面管理';

        return view('admin.page.index', compact('title', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '新建页面';

        return view('admin.page.create', compact('title'));
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
        $this->validate($request, [
            'title'   => 'required|max:255',
            'content' => 'required',
        ]);
        $values = [
            'title'         => $request->title,
            'content'       => $request->input('content'),
            'isAllowCommet' => empty($request->isAllowCommet) ? 0 : 1,
            'isTop'         => empty($request->isTop) ? 0 : 1,
            'order'         => $request->order ?: 0,
            'status'        => $request->status,
            'type'          => 2,
        ];

        $page = Page::create($values);

        return redirect(route('admin.page.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $title = '编辑页面';

        return view('admin.page.edit', compact('title', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title'   => 'required|max:255',
            'content' => 'required',
        ]);
        $page->title = $request->title;
        $page->content = $request->input('content');
        $page->isAllowCommet = empty($request->isAllowCommet) ? 0 : 1;
        $page->order = $request->order ?: 0;
        $page->status = $request->status;
        $page->save();

        return redirect(route('admin.page.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect(route('admin.page.index'));
    }
}
