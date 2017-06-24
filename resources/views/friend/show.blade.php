@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            @foreach ($user->friends->where('approved', '=', true) as $user_1)
                <div class="col-sm-3 text-center" style="padding: 5px;">
                    <div style="box-shadow: 0 0 10px 1px grey; padding: 20px;">
                        <img src="{{ $user_1->user2->profile_picture }}" alt="Profile Picture" width="50" height="50">
                        {{ $user_1->user2->username }}<br />
                        <a href="{{ route('user.show', $user_1->user2->id) }}">View User</a>
                    </div>
                </div>
            @endforeach
            @if ($user->friends()->count() == 0)
                <h1 class="text-center">This User does not have any friends</h1>
            @endif
        </div>
    </div>
@endsection
