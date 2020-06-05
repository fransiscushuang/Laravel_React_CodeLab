@extends('layouts.app')

@section('pageTitle', '- Add a new Story')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <form action="{{ route('story.save') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control {{$errors->has('title')? 'is-invalid':null}}" name="title"/>
                        <div class="invalid-feedback">{{ $errors->first('title')}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="editable {{$errors->has('description')? 'is-invalid':null}}" placeholder="Enter a description to the story"></textarea>
                        <div class="invalid-feedback">{{ $errors->first('description')}}</div>
                    </div>
                    <div class="d-flex flex-nowrap justify-content-end">
                        <a href="{{route('story.list')}}" class="btn btn-danger float-right">Back</a>
                        <button type="submit" class="btn btn-success float-right ml-2">Save</button>
                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Story Type</label>
                        <select name="story_type" class="form-control" >
                            <option value="bug" selected>Bug</option>
                            <option value="romance">Romance</option>
                            <option value="fiction">Fiction</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Assign users</label>
                        <select name="users[]" class="form-control {{$errors->has('users')? 'is-invalid':null}}" multiple>
                            <option selected>Select</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                            <option value="5">Mr. X</option>
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('users')}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">Assign users</label>
                        <input type="date" name="due_date" class="form-control">
                        <div class="invalid-feedback">{{ $errors->first('due_date')}}</div>
                    </div>
                </div>
            </div>



        </form>
        </div>
    </div>
</div>

@endsection
