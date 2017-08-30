@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default" style="margin: 0; border-radius: 0;">
              <div class="panel-heading">
                <h3 class="panel-title">{{ $post->title }}</h3>
              </div>
              <div class="panel-body">
                {{ $post->body }}
                @if ($post->image != null)
                    <img src="/images/{{ $post->image }}" alt="Image" width="100%" height="600">
                @endif
                <br />
                <div class="badge">
                    {{ $post->category->name }}
                </div>
              </div>
              <div class="panel-footer">
                  <a href="#" class="btn btn-link">Like</a>
                  <a href="#" class="btn btn-link">Dislike</a>
                  <a href="#" class="btn btn-link">Comment</a>
              </div>
            </div>
            <div class="panel panel-default" style="margin: 0; border-radius: 0;">
              <div class="panel-body">
                All comments here
              </div>
            </div>
            <div class="panel panel-default" style="margin: 0; border-radius: 0;">
              <div class="panel-body" style="display: flex;">
                <input type="text" name="comment" placeholder="Enter your Comment" class="form-control" style="border-radius: 0;">
                <input type="submit" value="Comment" class="btn btn-primary" style="border-radius: 0;">
              </div>
            </div>
        </div>
    </div>
@endsection
