<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Link;
use App\Option;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $links = Link::orderBy('id', 'desc')->paginate($perPage);
        $title = '链接管理';

        return view('admin.link.index', compact('links', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = '新建链接';

        return view('admin.link.create', compact('title'));
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
            'url'   => 'required|max:255',
        ]);
        Link::create([
            'title'       => $request->title,
            'description' => $request->description,
            'url'         => $request->url,
        ]);

        return redirect(route('admin.link.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($link)
    {
        $title = '编辑链接';

        return view('admin.link.edit', compact('title', 'link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $link)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'url'   => 'required|max:255',
        ]);
        $link->title = $request->title;
        $link->description = $request->description;
        $link->url = $request->url;
        $link->save();

        return redirect(route('admin.link.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
        $link->delete();

        return redirect(route('admin.link.index'));
    }
}
