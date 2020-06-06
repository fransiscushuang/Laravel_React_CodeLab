@extends('layouts.app')

@section('pageTitle', " #$story->id $story->title")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2 class="mb-3 font-weight-bold">#{{$story->id}} {{$story->title}}</h2>
        </div>
        <div class="col-md-3 mb-3">
            <a href="" class="btn btn-warning">Edit</a>
            <a href="" class="btn btn-primary">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="description-content">{!! $story->description !!}</div>
            <div id="comments-wrapper"></div>
        </div>
        <div class="col-md-3 col-sm-12 mt-4">
            <div class="border-bottom mb-3">
                <h5><strong>Dates</strong></h5>
                <p>
                    Created on : <strong>{{ $story->created_at }}</strong>
                    <br>
                    Due on : <strong>{{ $story->due_date }}</strong>
                </p>
            </div>
            <div class="border-bottom">
                <h5><strong>Story data</strong></h5>
                <p>
                Story type : <strong>{{ $story->story_type }}</strong>
                <br>
                Story points : <strong>{{ $story->story_points }}</strong>
            </p>
            </div>
        </div>
    </div>

</div>

@endsection
