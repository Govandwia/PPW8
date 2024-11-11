@extends('auth.layouts')
@section('content')
<h1>selamat datang di dashboard admin</h1>


<a href="{{ route('users.index') }}" class="btn btn-primary">Go to Users</a>
@endsection

