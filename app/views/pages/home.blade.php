@extends('layouts.default')

@section('content')
    <div class="jumbotron">
         <h1>Welcome to Larabook!</h1>
         <p>Welcome to the premier place to talk about laravel with others!</p>
         <p>
         {{link_to_route('register_path','Sign Up!', null, ['class'=>'btn btn-primary btn-lg'])}}
         </p>
    </div>


@stop

