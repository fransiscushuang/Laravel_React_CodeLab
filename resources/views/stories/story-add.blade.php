@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <form action="{{ route('story.save') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title"/>
            </div>

            <div class="form-group">
                <select name="story_type" class="form-control">
                    <option value="Bug" selected>Bug</option>
                    <option value="Romance">Romance</option>
                    <option value="Fiction">Fiction</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
    </div>
</div>

@endsection
