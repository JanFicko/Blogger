<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only'=>['create','edit']]);
        //$this->middleware('auth', ['except'=>['index','show']]);
    }

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
     * @param Article $article
     * @return $this
     */
    public function show(Article $article){ //Replace $id for Article $article
        //$article = Article::findOrFail($id);

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
        $tags = Tag::lists('name', 'id');
        return view('articles.create')->with('tags', $tags);
    }


    /**
     * Save object to database
     *
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request){
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

        Article::create($request->all());
        */

        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));

        //\Session::flash('flash_message', 'Your article has been created!');
        flash('Your article has been created!');

        return redirect('articles');
    }


    /**
     * Change data to existing object.
     *
     * @param $id
     * @return $this
     */
    public function edit(Article $article){
        $article = Article::findOrFail($article->id);
        $tags = Tag::lists('name', 'id');
        return view('articles.edit')->with('article', $article)->with('tags', $tags);
    }

    /**
     * Save changed data.
     *
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request){
        $article = Article::findOrFail($article->id);
        $article->update($request->all());

        $article->tags()->sync($request->input('tag_list'));

        return redirect('articles');
    }
}
