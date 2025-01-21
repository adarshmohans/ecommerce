@extends('layouts.master')
@section('title','New User')
@section('content')

<div class="container">
    <form action="{{ route('update.user') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ encrypt($user->id) }}">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
          </div>
        <div class="form-group">
          <label>Email address</label>
          <input type="email" name="email" value="{{ $user->email }}" class="form-control"   aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="text" name="dob" value="{{ $user->dob_formated }}" class="form-control" placeholder="Enter date of birth">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1" @if($user->status==1) selected="selected" @endif>Active</option>
                <option value="0" @if($user->status==0) selected="selected" @endif>Inactive</option>
            </select>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection