@extends('layout.default')

@section('content')

<h3>Name: {{$user->name}}</h3>
<h3>Email: {{$user->email}}</h3>
<h3>Email: {{$user->password}}</h3>

@endsection