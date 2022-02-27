<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $articles = Article::paginate(10);
    return view('dashboard.Article.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('dashboard.Article.create', get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $path = $request->file('img')->store('articles/images',['disk'=>'public']);
        Article::create([
            'title'=>$request->title,
            'details'=>$request->details,
            'category_id'=>$request->category_id,
            'img'=> $path
        ]);
        return redirect()->route('admin.article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
       return view('dashboard.Article.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::get();
        return view('dashboard.Article.edit', get_defined_vars());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if ($request->file('img')) {
            $path = $request->file('img')->store('articles/images', ['disk' => 'public']);
            $article->update(['img'=>$path]);
        }
        $article->update([
            'title' => $request->title,
            'details' => $request->details,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.article.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
       $article->delete();
        return redirect()->route('admin.article.index');
    }
}
