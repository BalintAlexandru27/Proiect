@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $photo->title }}</h3>
        <p>{{ $photo->description }}</p>
        <a href="{{ route('album-show', $photo->album->id) }}" class="btn btn-info">Go Back</a>
        <small>Size: {{ $photo->size }}-></small>
        <hr>
        <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}">
        <hr>
    </div>
@endsection
