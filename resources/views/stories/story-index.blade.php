@extends('layouts.app')

@section('pageTitle', '- Stories on my project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span><strong>Stories</strong></span>
                    <a href="{{ route('story.add')}}" class="float-right font-weight-bold">Add Story</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stories as $story)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column">
                                    <h5 class="text-primary font-weight-bold"><a href="{{ route('story.view', $story->id) }}">#{{ $story->id }} {{ $story->title }}</a></h5>
                                        <h6 class="font-weight-bold">Created by <span class="text-primary inline">{{ auth()->user()->name }}</span> Due Date {{ $story->due_date }}</h6>
                                    </div>
                                </td>
                                <td class="font-weight-bold">{{ $story->story_type }}</td>
                                <td class="font-weight-bold">{{ $story->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            {{ $stories->render() }}
        </div>
    </div>
</div>

@endsection
