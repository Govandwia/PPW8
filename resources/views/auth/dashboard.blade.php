@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>
                @endif
            </div>
        </div>
    </div>
<div class="row justify-content-center mt-3">
    <div class="col-md-8 text-center">
        <a href="{{ route('dashboard_admin') }}" class="btn btn-primary">Go to Admin Dashboard</a>
    </div>
</div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-md-8 text-center">
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Go to Gallery</a>
    </div>
</div>
@endsection
