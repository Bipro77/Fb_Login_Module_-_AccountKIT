@extends('layouts.app')

@section('content')

<h2>Login Success</h2>
<p>Name: {{ $name }} </p>
<p>Email: {{ $email }}</p>
<p>Login with: {{ $type }}</p>

@endsection
