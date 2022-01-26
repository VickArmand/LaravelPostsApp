@extends ('layouts.index')
@section('content')
<div class="container">
<div class="form">
<form action="/posts" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <div class="form-control">
    Post Title
<input type="text" name="title" id="" placeholder="Enter the post title">
</div>
<div class="form-control">
Post Body
<textarea name="body" name="body" id="" cols="5" rows="5" placeholder="Enter the post body"></textarea>
</div>
<div class="form-control">
<input type="file" name="cover_image" class="btn btn-info" value="Attach file">
</div>
<div class="form-control">
<input type="submit" class="btn btn-info" value="CREATE POST">
</div>
</div>
</form>
</div>



</div>



@endsection