<?php

namespace App\Actions\Story;

use Illuminate\Support\Facades\Notification;
use App\Models\Story;
use App\Models\User;
use App\Notifications\Story\StoryAssigned;

class StoryEmailNotifications
{
    public function execute(Story $story)
    {
        $story = Story::with(['users'])
            ->where('id', $story->id)
            ->first();


        $assignedUsers = $story->users->pluck('user_id');

        $users = User::whereIn('id', $assignedUsers)->get();

        Notification::send($users, new StoryAssigned($story));
    }
}
