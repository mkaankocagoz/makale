<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /** Get article by user */
    public function article($id){
        try{
            $article  = User::find($id)->articles;
            return $article;
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }

    /** Get comment by user */
    public function comment($id){
        try{
            $comments  = User::find($id)->comments;
            return $comments;
        }catch(Exception $exception){
            return response([
                'message' => [$exception->getMessage()]
            ], 500);
        }
    }
}
