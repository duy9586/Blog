<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = ArticleModel::paginate(5);
        return view('article.list')->with('articles', $articles);
    }

    public function create(StoreArticleRequest $request)
    {
       return view('article.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $articals = new ArticleModel;
        $articals->title = $request->title;
        $articals->content = $request->content;
        $articals->save();

        return redirect()->route('post.create');
    }

    public function show($id)
    {
        $article = ArticleModel::find($id);
        return view('article.update')->with('data', $article);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $news = ArticleModel::find($id);
        $news->title = $request->title;
        $news->content = $request->content;

        $news->save();
        //return redirect()->route('post.index');
        return redirect()->route('post.index',['page'=> 2]);
    }

    public function destroy($id)
    {
        ArticleModel::find($id)->delete();
        return redirect()->route('post.index');
    }
}
