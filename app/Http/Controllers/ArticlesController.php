<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;
use Request;

use App\Http\Requests;


class ArticlesController extends Controller
{

    /**
     * Show latest articles
     *
     * @return Response
     */
    public function index(){
        //$articles = Article::latest('published_at')->get();
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show single article
     *
     * @param $id
     * @return Response
     */
    public function show($id){
        $article = Article::findOrFail($id);

        /*if(is_null($article)){
            abort(404);
        }*/

        return view('articles.show')->with('article', $article);
    }


    /**
     * Redirect to site with create form
     *
     * @return Response
     */
    public function create(){
        return view('articles.create');
    }


    /**
     * Save object to database
     *
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(CreateArticleRequest $request){
        /*
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        */

        /*
        $title = Request::get('title');;
        $body = Request::get('body');
        */

        /*
        $article = new Article(['title'=>input['title'], 'body'=>input['body']]);
        $article = new Article();
        $article->title = input['title'];
        $article->body = input['body'];
        $article->save();
        */

        //Article::create(Request::all());

        Article::create($request->all());

        return redirect('articles');
    }
}
