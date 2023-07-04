<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
