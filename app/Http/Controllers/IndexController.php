<?php

namespace App\Http\Controllers;

use App\Option;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '首页';
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $articles = Page::articles()->paginate($perPage);
        return view('index.index', compact('title', 'articles'));
    }
}
