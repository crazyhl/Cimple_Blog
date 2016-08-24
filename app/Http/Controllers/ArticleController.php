<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        $title = $article->title;

        return view('index.article', compact('title', 'article'));
    }
}
