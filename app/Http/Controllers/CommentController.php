<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function create(Request $request)
    {
        $postData = $this->validate($request, [
            'comment' => 'required',
            'storyId' => 'required|exists:stories,id',
        ]);

        $story = Story::findOrFail($postData['storyId']);

        $comment = $story->comments()->create([
            'body' => $postData['comment'],
            'user_id' => $request->user()->id,
        ]);

        return response($comment, 201);
    }
}
