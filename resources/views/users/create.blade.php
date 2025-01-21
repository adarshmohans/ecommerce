@extends('layouts.master')
@section('title','New User')
@section('content')

<div class="container">
    <form action="{{ route('save.user') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
          </div>
        <div class="form-group">
          <label>Email address</label>
          <input type="email" name="email" class="form-control"   aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="text" name="dob" class="form-control" placeholder="Enter date of birth">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection