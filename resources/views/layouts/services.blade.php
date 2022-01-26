@extends('layouts.index')
@section('content')
<h1>{{$title}}</h1>
<p>The services available are:</p>
@if(count($services)>0)
<div class="list-group">
@foreach($services as $service)
<li class="list-group-item">{{$service}}</li>

@endforeach
</div>
@endif
@endsection