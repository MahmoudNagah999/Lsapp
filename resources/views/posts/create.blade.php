@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action'=>'postscontroller@store', 'method'=>'post', 'enctype' =>'multipart/form-data' ]) !!}
        <div class="form-groub">
            {{form::label('title','Title')}}
            {{form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <hr>
        <div class="form-groub">
            {{form::label('body','Body')}}
            {{form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
        <hr>
        <br>
        {{form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    
@endsection