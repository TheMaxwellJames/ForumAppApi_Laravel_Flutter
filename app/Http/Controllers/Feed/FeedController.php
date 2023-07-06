<?php

namespace App\Http\Controllers\Feed;






use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\PostRequest;

use App\Models\Feed;
use App\Models\Like;

class FeedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:6',
        ]);

        auth()->user()->feeds()->create([
                'content' => $request->content
        ]);

        return response([
            'message' => 'Success',
        ],201);
    }


    public function likePost($feed_id)
    {
        //Select feed with Id

        $feed = Feed::whereId($feed_id)->first();

        if(!$feed){
            return response([
                'message' => '404 Not found'
            ], 500);
        }

    //Unlike Post
         $unlike_post = Like::where('user_id', auth()->id())->where('feed_id', $feed_id)->delete();
         if($unlike_post)
         {
            return response([
                'message' => 'Unliked'
            ], 200);
         }


         //like Post
         $like_post = Like::create([
            'user_id' => auth()->id(),
            'feed_id' => $feed_id
         ]);
         if($like_post)
         {
            return response([
                'message' => 'liked'
            ], 200);
         }

 

    }

}
