<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $comments = Comment::get();
            return $comments;
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
    public function store(CommentStoreRequest $request)
    {
        try{
            $article = new Comment();
            $article->user_id = Auth::user()->id;
            $article->article_id = $request->article_id;
            $article->content = $request->content;
            $article->save();

            return response(['message' => 'Comment Created Successfully']);
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
            $comment = Comment::find($id);
            return $comment;
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
            $article = Comment::find($id);
            $article->user_id = Auth::user()->id;
            $article->article_id = $request->article_id;
            $article->content = $request->content;
            $article->save();

            return response(['message' => 'Comment Updated Successfully']);
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
            Comment::findOrFail($id)->delete();
            return response(['message' => 'Comment Deleted Successfully']);
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }
}
