<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use App\Tag;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => 'create']); //can use except instead of only
    }
    
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        
        return view('articles.index', compact('articles'));
                                
    }
    
    public function show(Article $article)
    {
        //$article = Article::findOrFail($id);
        
        //dd($article->published_at->diffForHumans());
        
        return view('articles.show', compact('article'));
        
    }
    
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }
    
    //Using form request
    public function store(ArticleRequest $request)
    {
        //$input = Request::all();
        //$input['published_at'] = Carbon::now();
        
        //$article = new Article($request->all());
        //Auth::user()->articles()->save($article);
        
        //dd($request->input('tags'));
        
        $this->createArticle($request);
        
        flash()->success('Your article has been created!');
        
        return redirect('articles');
    }
    
    /* 
    //Using validation in controller
    public function store(Request $request)
    {
        //$input = Request::all();
        //$input['published_at'] = Carbon::now();
        $this->validate($request, ['title' => 'required', 'body' => 'required']);
        Article::create($request->all());
        return redirect('articles');
    }
    */
    
    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }
    
    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return redirect('articles');
    }
    
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }
    
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        
        $this->syncTags($article, $request->input('tag_list'));
        
        return $article;
    }
}
