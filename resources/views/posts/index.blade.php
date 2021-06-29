@extends('layouts.app')

@section('content')
    <br>
    <h1>Posts</h1>
    @if (count($allposts) > 0)
        @foreach ($allposts as $post)
        <!-- this class="card card-body bg-light" ==class="well" --> 
            <div class="card card-body bg-light">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>weitten on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
        <br>
        {{$allposts->links()}}
    @else
        <p>there is no posts</p>
    @endif
@endsection