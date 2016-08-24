<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Option;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cate)
    {
        $title = $cate->title;
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $articles = $cate->articles()->where('type', 1)->orderBy('isTop', 'desc')->orderBy('order', 'desc')->orderBy('updated_at', 'desc')->paginate($perPage);
        return view('index.index', compact('title', 'articles'));
    }
}
