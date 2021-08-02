@extends('Layouts.app')

@section('title', 'Page Title')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">

  <div class="card-header">
    <a class="btn btn-primary" href="/posts/create"> Create New Post</a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Post Title</td>
          <td>Post Body</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td><a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a class="btn btn-primary" href="{{ route('posts.show',$post->id) }}">Show</a></td>
            <td>
                <!-- SEM AJAX <form action="{{ route('posts.destroy', $post->id)}}" method="post">-->
                <form name="AjaxDelete">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
@stop

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
  $(function(){
    $('form[name="AjaxDelete"]').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:"{{route('posts.destroy', $post->id)}}",
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
            if (response.success === true){
                window.location.href = "{{route('posts.index')}}";
            }else{
                alert('Erro ! ' + response.message)
            }
                console.log(response);
            }
        });

    });
});
</script>