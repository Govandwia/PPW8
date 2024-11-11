
@extends('auth.layouts')

@section('content')
<div class="container">
    <h2>Edit Gallery Item</h2>
    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}" required>
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" rows="5" name="description" required>{{ $gallery->description }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">File input</label>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="file" class="form-control" id="input-file" name="picture">
                    <label class="input-group-text" for="input-file">Choose file</label>
                </div>
                @if ($gallery->picture)
                    <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="{{ $gallery->title }}" width="100">
                @endif
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection