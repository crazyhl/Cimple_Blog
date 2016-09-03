<?php

namespace App\Http\Controllers;

use App\Option;

class CateController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($cate)
    {
        $title = $cate->title;
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $articles = $cate->articles()->articles()->where('status', 1)->paginate($perPage);

        return view('index.index', compact('title', 'articles'));
    }
}
