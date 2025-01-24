@extends('layouts.master')
@section('title','welcome')
@section('content')

@if(session()->has('message')) <h6> {{ session()->get('message') }} </h6>@endif
<form action="{{ route('do.login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember Password?</label>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>

@endsection
