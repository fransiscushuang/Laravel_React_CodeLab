<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    //
    public function index()
    {
        $stories = Story::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('stories.story-index')->with('stories', $stories);
    }

    public function create()
    {
        return view('stories.story-add');
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'title' => 'required|min:3',
            'story_type' => 'required'
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['epic_id'] = 1;


        $story = Story::create($postData);

        return redirect()->route('story.list');
    }
}
