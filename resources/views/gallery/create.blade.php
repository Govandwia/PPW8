
@extends('auth.layouts')

@section('content')
<div class="container">
    <h2>Create Gallery Item</h2>
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" rows="5" name="description" placeholder="Enter description"></textarea>
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
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection