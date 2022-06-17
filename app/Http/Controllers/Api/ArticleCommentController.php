<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class ArticleCommentController extends Controller
{
    /** Get article by comment */
    public function article($id){
        try{
            $article  = Comment::find($id)->article;
            return $article;
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }

    /** Get comment by article */
    public function comment($id){
        try{
            $comments  = Article::find($id)->comments;
            return $comments;
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }
}
