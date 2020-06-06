<?php

namespace App\Http\Controllers;

use App\Events\Story\StoryCreate;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    //
    public function index()
    {
        $stories = Story::query()
            ->orderBy('created_at', 'asc')
            ->paginate(5);

        return view('stories.story-index')->with('stories', $stories);
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('stories.story-add')->with('users', $users);
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'title' => 'required|min:3',
            'story_type' => 'required',
            'description' => 'required|min:3',
            'users' => ['required', 'array', function ($attribute, $value, $fail) {
                $count = User::whereIn('id', $value)->count();
                if ($count !== count($value)) {
                    $fail($attribute . ' is invalid');
                }
            }],
            'due_date' => 'required|date_format:Y-m-d',
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['epic_id'] = 1;
        $userIds = $postData['users'];
        unset($postData['users']);

        $story = Story::create($postData);
        $data = [];
        foreach ($userIds as $id) {
            $data[] = ['user_id' => $id];
        }

        $story->users()->createMany($data);

        event(new StoryCreate($story));

        return redirect()->route('story.list');
    }

    public function view($id, Story $story)
    {
        $story = $story->where('id', $id)
            ->first();

        return view('stories.story-view')->with('story', $story);
    }
}
