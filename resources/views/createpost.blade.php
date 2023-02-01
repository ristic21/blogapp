@extends('layout.default')


@section('content')

 <form class="container mb-5" action="{{ url('createpost') }}" method="POST">
    @csrf
    <div class="mb-3">
      <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
    </div>
    <div class="mb-3">
      <textarea class="form-control" id="body" name="body" placeholder="Body" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create post</button>
</form>

<div class="container">
  @include('components.session-handler')
  @include('components.error-handler')
</div>

@endsection