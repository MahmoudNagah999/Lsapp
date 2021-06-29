@extends('layouts.app')

@section('content')
    <br>
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>
    <p>
    {!!$post->body!!}
    </p>   
    <small>written at{{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
         @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
        
            {!!Form::open(['action' => ['postscontroller@destroy',$post->id], 'method'=>'post' , 'class' => 'float-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
            <hr>
        @endif
    @endif
@endsection