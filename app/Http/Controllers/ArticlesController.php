<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Request;

use App\Http\Requests;


class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::latest('published_at')->get();

        return view('articles.index')->with('articles', $articles);
    }
    
    public function show($id){
        $article = Article::findOrFail($id);

        /*if(is_null($article)){
            abort(404);
        }*/

        return view('articles.show')->with('article', $article);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        $input = Request::all();
        $input['published_at'] = Carbon::now();

        /*$title = Request::get('title');;
        $body = Request::get('body');*/

        //$article = new Article(['title'=>input['title'], 'body'=>input['body']]);
        /*$article = new Article();
        $article->title = input['title'];
        $article->body = input['body'];
        $article->save();*/

        Article::create($input);

        return redirect('articles');
    }
}
