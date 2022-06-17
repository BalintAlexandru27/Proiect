@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit and Update photo</h2>
        <form method="put" action="{{ url('/photos/update/'.$photo->id) }}" enctype="multipart/form-data">
            @csr
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{ $photo->title }}" name="title" id="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" value="{{ $photo->description }}" name="description" id="description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="tag">photo_tag</label>
                <input type="text" class="form-control" value="{{ $photo->photo_tag }}" name="photo_tag" id="photo_tag" placeholder="Enter tag">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection