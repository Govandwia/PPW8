
@extends('auth.layouts')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            <small>Leave blank to keep current password</small>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control">
            @if ($user->photo)
                <img src="{{ asset("storage/{$user->photo}") }}" alt="{{ $user->name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection