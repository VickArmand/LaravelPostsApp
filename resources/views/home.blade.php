@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="panel-body"><a class="btn btn-primary" href="/posts/create">Create Blogs</a></div>
                    <h3><p>Your blog posts</p></h3>
                   @if(count($posts)>0)
                    <table class="table table-striped">
<tr>
    <th>Title</th>
    <th colspan=2>Action</th>
   
</tr>

@foreach($posts as $post)
<tr>
   
    <td>{{$post->title}}</td>
    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a></td>
    <td><a href="/posts/delete/{{$post->id}}" class="btn btn-danger">Delete Post</a></td>

    
</tr>
@endforeach


                    </table>
                    @else
<div class="alert alert-danger">No posts found</div>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
