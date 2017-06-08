<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Friend;
use App\User;

class FriendController extends Controller
{
    public function index(Request $request) {
        $friend = new Friend;
        $friend->user_id_1 = Auth::user()->id;
        $friend->user_id_2 = $request->friend_id;
        $friend->save();

        return [
            'friend_id' => $request->friend_id
        ];
    }
    public function showFriends($id) {
        $user = User::find($id);
        return view('friend.show')->withUser($user);
    }
}
