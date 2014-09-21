{{Form::open(['route'=>'follows_path'])}}
    {{Form::hidden('userIdToFollow',$user->id)}}
    <button type="submit" class="btn btn-primary ">Follow {{$user->username}}</button>
{{Form::close()}}