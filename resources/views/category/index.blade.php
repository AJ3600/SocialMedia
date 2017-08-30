@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="col-sm-6">
            @foreach ($categories as $category)
                <div class="panel panel-default">
                  <div class="panel-body">
                    {{ $category->name }}
                  </div>
                  <div class="panel-footer">
                      <small>Created by {{ $category->user->username }}</small>
                  </div>
                </div>
            @endforeach
            {{ $categories->links() }}
        </div>
        <div class="col-sm-6">
            <div class="well">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="name control-label">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter your category name" name="name">
                      @if ($errors->has('name'))
                          <small class="text-danger">{{ $errors->first('name') }}</small>
                      @endif
                    </div>
                    <input type="submit" value="Submit" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection
