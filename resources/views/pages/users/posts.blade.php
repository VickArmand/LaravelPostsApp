@extends('layouts.index')
@section('content')
<div class="container">
@if(count($posts)>0)
<div class="well">
<div class="list-group">

@foreach($posts as $post)
<div class="list-group-item">

    <div class="row">
    <div class="col-md-4 col-sm-8">
        <img style=" max-width: 100%;
  height: auto;" src="/storage/cover_images/{{$post->cover_image}}" class="img-fluid img-thumbnail" srcset="">
    </div>
    <div class="col-md-8 col-sm-8">
    <h3><a href="/posts/{{$post->id}}" class="link-success">{{$post->title}}</a></h3>
    <small>This post was created on {{$post->created_at}} by {{$post->user->name}}</small>
    <br>
    @if(!Auth::guest())
    @if(Auth::user()->id==$post->user_id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit Post</a>
    
    <a href="/posts/delete/{{$post->id}}" class="btn btn-danger">Delete Post</a>
    @endif
   @endif
</div>
</div>
</div>
@endforeach

{{$posts->links()}}
@else
<div class="alert alert-danger" >No posts Found</div>
</div>
@endif
</div>
@endsection


