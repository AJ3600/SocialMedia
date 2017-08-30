@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            @foreach ($posts as $post)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                        Created by {{ $post->user->username }}, {{ $post->title }}
                        <div class="pull-right">
                            <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-link">Show Post</a>
                        </div>
                    </h3>
                  </div>
                  <div class="panel-body">
                    {{ $post->body }}
                    @if ($post->image != null)
                        <img src="/images/{{ $post->image }}" alt="Image" width="100%" height="600">
                    @endif
                    <br />
                    Category: <div class="badge">{{ $post->category->name }}</div>
                  </div>
                  <div class="panel-footer">
                      <a href="#" class="btn btn-link">Like</a>
                      <a href="#" class="btn btn-link">Dislike</a>
                      <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-link">Comment</a>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
