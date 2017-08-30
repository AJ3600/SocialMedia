@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            @foreach ($posts as $post)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                        Created by {{ $post->user->username }}, {{ $post->title }},
                        @if ($post->friends()->count() > 0)
                            <small>
                                with
                                @foreach ($post->friends as $tag)
                                    {{ $tag->user2->username }},
                                @endforeach
                            </small>
                        @endif
                        <div class="pull-right">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('post.show', [$post->id]) }}">Show Post</a></li>
                                    <li><a href="{{ route('post.edit', [$post->id]) }}">Edit Post</a></li>
                                    <li>
                                        <a href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                        {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $post->id]]) !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </div>
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
                  <div class="panel-footer" data-postid="{{ $post->id }}">
                      @php
                          $i = Auth::user()->likes()->count();
                          $c = 1;
                          $likeCount = $post->likes()->where('like', '=', true)->count();
                          $dislikeCount = $post->likes()->where('like', '=', false)->count();
                      @endphp
                      @foreach (Auth::user()->likes as $like)
                          @if ($like->post_id == $post->id)
                              @if ($like->like)
                                  <a href="#" class="btn btn-link like active-like">Like <span class="badge">{{ $likeCount }}</span></a>
                                  <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                              @else
                                  <a href="#" class="btn btn-link like">Like <span class="badge">{{ $likeCount }}</span></a>
                                  <a href="#" class="btn btn-link like active-like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                              @endif
                              @break
                          @elseif ($i == $c)
                              <a href="#" class="btn btn-link like">Like <span class="badge">{{ $likeCount }}</span></a>
                              <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                          @endif
                          @php
                              $c++;
                          @endphp
                      @endforeach
                      @if ($i == 0)
                          <a href="#" class="btn btn-link like">Like <span class="badge">{{ $likeCount }}</span></a>
                          <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                      @endif
                      <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-link">Comment</a>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
