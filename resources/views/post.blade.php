@extends('layout.default')

@section('content')

<div class="container my-5">
  <div class="bg-light p-5 rounded">
    <div class="col-sm-8 py-5 mx-auto">
      <h1 class="display-5 fw-normal">{{ $post->title }}</h1>
      <p class="fs-5">{{ $post->body }}</p>
      <strong class="d-block text-gray-dark">{{$post->user->name}}</strong>
  </div>
  </div>
</div>

<form class="container mb-3" action="{{ url('createcomment') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="body" class="label mb-2">Enter your comment</label>
    <textarea rows="4" class="form-control" id="body" name="body" placeholder="Add comment" required></textarea>
    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
  </div>
  <button type="submit" class="btn btn-primary">Post Comment</button>
</form>

@include('components.error-handler')
@include('components.session-handler')

@include('components.comments')

@endsection