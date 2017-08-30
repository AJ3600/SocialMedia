@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <img src="{{ Auth::user()->profile_picture }}" alt="">
                        Welcome {{ Auth::user()->username }}
                    </h3>
                </div>
                <div class="panel-body">
                    <div>
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">Posts</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                        <li role="presentation"><a href="#categories" aria-controls="comments" role="tab" data-toggle="tab">Categories</a></li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active fade in" id="posts">
                            {{ Auth::user()->posts()->count() }} Posts created
                            @foreach (Auth::user()->posts as $post)
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">{{ $post->title }}</h3>
                                  </div>
                                  <div class="panel-body">
                                    {{ $post->body }}
                                    <br />
                                    Category: <div class="badge">{{ $post->category->name }}</div>
                                  </div>
                                </div>
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="comments">
                            All the comments created by this user will be showed here
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="categories">
                            {{ Auth::user()->categories()->count() }} Categoreies created
                            @foreach (Auth::user()->categories as $category)
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                    {{ $category->name }}
                                  </div>
                                </div>
                            @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
