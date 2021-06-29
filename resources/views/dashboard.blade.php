@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="/posts/create">Creat post</a>
                    <h3>your bloge posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>

                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edite</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['postscontroller@destroy',$post->id], 'method'=>'post' , 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h3>you have no posts</h3>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
