@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->username }}
                    <img src="{{ Auth::user()->profile_picture }}" alt="">
                    <br /><br />
                    <div>
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">Posts</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="posts">

                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">

                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
