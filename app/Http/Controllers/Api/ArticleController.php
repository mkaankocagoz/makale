<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $articles = Article::get();
            return $articles;
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        try{
            $article = new Article();
            $article->user_id = Auth::user()->id;
            $article->content = $request->content;
            $article->save();

            return response(['message' => 'Article Created Successfully']);
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $article = Article::find($id);
            return $article;
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $article = Article::find($id);
            $article->user_id = Auth::user()->id;
            $article->content = $request->content;
            $article->save();

            return response(['message' => 'Article Updated Successfully']);
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Article::findOrFail($id)->delete();
            return response(['message' => 'Article Deleted Successfully']);
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }
}
