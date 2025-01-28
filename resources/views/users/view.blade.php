@extends('layouts.master')
@section('title','New User')
@section('content')

<div class="container">
    <ul>
        <li>Name : {{ $user->name }}</li>
        <li>Email : {{ $user->email }}</li>
        <li>Status : {{ $user->status_text }}</li>
    </ul>
    <hr>
    <ul>
        <li>Address Line 1 : {{ $user->address->address_line_1 }}</li>
        <li>State : {{ $user->address->state }}</li>
    </ul>
</div>

@endsection
