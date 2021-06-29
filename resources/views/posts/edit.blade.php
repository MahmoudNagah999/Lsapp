@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action'=>['postscontroller@update' , $post->id ], 'method'=>'PUT', 'enctype' =>'multipart/form-data' ]) !!}
        <div class="form-groub">
            {{form::label('title','Title')}}
            {{form::text('title', $post->title ,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <hr>
        <div class="form-groub">
            {{form::label('body','Body')}}
            {{Form::textarea('body', $post->body ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
        <br>
        <hr>
        {{form::submit('submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
 
@endsection