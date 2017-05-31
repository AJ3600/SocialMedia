<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function index(Request $request) {
        $likes = Like::all()->where('user_id', '=', Auth::user()->id)->where('post_id', '=', $request->post_id)->first();
        if ($likes == null) {
            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->post_id = $request->post_id;
            $like->like = $request->isLike;
            $like->save();
        }
        else {
            $likes->like = $request->isLike;
            $likes->save();
        }
        return [
            'post_id' => $request->post_id
        ];
    }
}
