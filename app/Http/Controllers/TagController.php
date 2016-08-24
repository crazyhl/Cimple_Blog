<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        $title = $tag->title;
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $articles = $tag->articles()->where('type', 1)->orderBy('isTop', 'desc')->orderBy('order', 'desc')->orderBy('updated_at', 'desc')->paginate($perPage);
        return view('index.index', compact('title', 'articles'));
    }


}
