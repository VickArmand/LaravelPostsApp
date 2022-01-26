@extends('layouts.index')
@section('content')
<div class="container">
<div class="list-group-item">
<a href="/posts" class="btn btn-secondary">Go Back</a>

    
    <div class="well">
    <div class="row">
   
        <img style="" src="/storage/cover_images/{{$post->cover_image}}" class="img-thumbnail" srcset="">

    <div class="col-md-8 col-sm-8">
    <br>
    <h3 class="link-success">{{$post->title}}</h3>
    {{$post->body}}
    <br>
    <small>This post was created on {{$post->created_at}} by {{$post->user->name}}</small>
    <br>
    <small>This post was updated on {{$post->updated_at}} by {{$post->user->name}}</small>
    <br>
    </div>  
    </div> 
    </div>
    @if(!Auth::guest())
    @if(Auth::user()->id==$post->user_id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit Post</a>
    <a href="/posts/delete/{{$post->id}}" class="btn btn-danger">Delete Post</a>
    @endif
    @endif
</div>
</div>
@endsection


