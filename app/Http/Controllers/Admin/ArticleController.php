<?php

namespace App\Http\Controllers\Admin;

use App\Cate;
use App\Http\Controllers\Controller;
use App\Option;
use App\Page;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = Option::where('name', 'PER_PAGE')->value('value');
        $articles = Page::articles()->paginate($perPage);
        $title = '文章管理';

        return view('admin.article.index', compact('title', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '新建文章';
        $cates = Cate::orderBy('updated_at', 'desc')->get();
        $tags = Tag::all();

        return view('admin.article.create', compact('title', 'cates', 'tags'));
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
            'cate'    => 'required',
            'content' => 'required',
        ]);
        $page = Page::create([
            'title'         => $request->title,
            'content'       => $request->input('content'),
            'isAllowCommet' => empty($request->isAllowCommet) ? 0 : 1,
            'isTop'         => empty($request->isTop) ? 0 : 1,
            'order'         => $request->order ?: 0,
            'status'        => $request->status,
            'type'          => 1,
        ]);
        foreach ($request->cate as $cate) {
            $c = Cate::find($cate);

            $page->cates()->save($c);
            $cateCount = DB::table('cate_page')->where('cate_id', $cate)->count();
            $c->count = $cateCount;
            $c->save();
        }
        $tags = str_replace('，', ',', $request->tags);
        $tags = explode(',', $tags);
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if ($tag) {
                $t = Tag::where('title', $tag)->first();
                if ($t) {
                    $page->tags()->save($t);
                } else {
                    $t = $page->tags()->create([
                        'title' => $tag,
                        'count' => 1,
                    ]);
                }
                $tagCount = DB::table('page_tag')->where('tag_id', $t->id)->count();
                $t->count = $tagCount;
                $t->save();
            }
        }

        return redirect(route('admin.article.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $article)
    {
        $title = '编辑文章';
        $cates = Cate::orderBy('updated_at', 'desc')->get();
        $tags = Tag::all();

        return view('admin.article.edit', compact('title', 'article', 'cates', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $article)
    {
        $this->validate($request, [
            'title'   => 'required|max:255',
            'cate'    => 'required',
            'content' => 'required',
        ]);
        $oldCates = $article->cates()->get();
        $oldTags = $article->tags()->get();
        $article->title = $request->title;
        $article->content = $request->input('content');
        $article->isAllowCommet = empty($request->isAllowCommet) ? 0 : 1;
        $article->isTop = empty($request->isTop) ? 0 : 1;
        $article->order = $request->order ?: 0;
        $article->status = $request->status;
        $article->save();
        DB::table('cate_page')->where('page_id', $article->id)->delete();
        foreach ($request->cate as $cate) {
            $c = Cate::find($cate);

            $article->cates()->save($c);
            $cateCount = DB::table('cate_page')->where('cate_id', $cate)->count();
            $c->count = $cateCount;
            $c->save();
        }
        $tags = str_replace('，', ',', $request->tags);
        $tags = explode(',', $tags);

        DB::table('page_tag')->where('page_id', $article->id)->delete();
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if ($tag) {
                $t = Tag::where('title', $tag)->first();
                if ($t) {
                    $article->tags()->save($t);
                } else {
                    $t = $article->tags()->create([
                        'title' => $tag,
                        'count' => 1,
                    ]);
                }
                $tagCount = DB::table('page_tag')->where('tag_id', $t->id)->count();
                $t->count = $tagCount;
                $t->save();
            }
        }

        foreach ($oldCates as $oldCate) {
            $oldCate->count = DB::table('cate_page')->where('cate_id', $oldCate->id)->count();
            $oldCate->save();
        }
        foreach ($oldTags as $oldTag) {
            $tagCount = DB::table('page_tag')->where('tag_id', $oldTag->id)->count();
            if ($tagCount > 0) {
                $oldTag->count = $tagCount;
                $oldCate->save();
            } else {
                $oldTag->delete();
            }
        }

        return redirect(route('admin.article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $article)
    {
        $article->delete();

        return redirect(route('admin.article.index'));
    }
}
