<?php

namespace App\Http\Controllers;

use Parsedown;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Parser\Inline\AutolinkParser;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $articles = Article::all();
        return view('blade.articles.all',[
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blade.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->input('title'), "-");
        $response = cloudinary()->upload($request->input('image'))->getSecurePath();

        $image = $response ? $response : 'https://fakeimg.pl/690x420/';

        $article = new Article();
        $article->slug = $slug;
        $article->user_id = Auth()->user()->id;
        $article->title = $request->title;
        $article->thumbnail = $image;
        $article->bodyMkd = $request->body;
        $article->status = 1;
        $article->save();

        Toastr::success('Saved Successfully', ' ', ["positionClass" => "toast-bottom-center"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $Parsedown = new Parsedown();
        $text = $Parsedown->text($article->bodyMkd);

        return view('blade.articles.show', [
            'article' => $article,
            'text' => $text
        ]);
    }


    public function mine()
    {
        $user = Auth()->user();
        $articles = $user->articles;

        return view('blade.articles.mine', [
            'articles' => $articles,
        ]);
    }

    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();

        return view('blade.articles.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $user = Auth()->user();
        $article = $user->articles->where('slug', $slug)->first();

        $article->title = $request->title;
        $article->bodyMkd = $request->body;
        $article->overallMkd = $request->overall;
        $article->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = Auth()->user();
        $article = $user->articles->where('slug', $slug)->first();
        $article->delete();

        return back();
    }
}
