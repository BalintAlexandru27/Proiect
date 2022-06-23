@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Edit and Update photo</h2>
            <form method="post" action="{{ route('photo-update', $photo->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $photo->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $photo->description }}">
                </div>
                <div class="form-group">
                    <label for="tag">Tags</label>
                    <input type="text" class="form-control" name="tags" id="tags" value="{{ $photo->tags }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </div>
@endsection