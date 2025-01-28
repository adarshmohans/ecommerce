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

    <table class="table">
        <thead>
            <tr>
                <td scope="col">Order ID</td>
                <td scope="col">Price</td>
                <td scope="col">Status</td>
                <td scope="col">Placed at</td>
            </tr>
        </thead>
        <tbody>
            @foreach($user->orders as $order)
            <tr>
                <td>{{$order->order_id}}</td>
                <td>{{number_format($order->price,2)}}</td>
                <td>{{ $order->status_text }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
