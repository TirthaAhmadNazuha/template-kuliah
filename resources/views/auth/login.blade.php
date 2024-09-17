@extends('layout.app')
@section('title', 'Login')

@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf
  <label>Email:</label>
  <input type="email" name="email" required>
  <label>Password:</label>
  <input type="password" name="password" required>
  <p>
    dont have account? <a class="a" href="/register">Register here</a>
  </p>
  <button class="btn-primary" type="submit">Login</button>
</form>
@endsection
