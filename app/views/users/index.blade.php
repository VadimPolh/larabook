@extends('layouts.default')


@section('content')

<h1>All Users</h1>


    @foreach($users as $user)
        <div class="col-md-3 user-block">
        @include('layouts.partials.avatar')
        <h4 class="user-block-username">{{$user->username}}</h4>

        </div>
    @endforeach

@stop