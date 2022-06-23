@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Photoshow</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@if (count($searched_items) > 0)
    <div class="container">
        <div class="row"> 
            @foreach ($searched_items as $photo)
		        
                	<div class="col-md-4">
                    	<div class="card mb-4 shadow-sm">
                            <img src="/storage/albums/{{ $photo->album->id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" height="200px">
                        	<div class="card-body">
                            	<p class="card-text">{{ $photo->description}}</p>
                            	<div class="d-flex justify-content-between align-items-center">
                                	<div class="btn-group">
                                    	<a href="{{ route('photo-show', $photo->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                	</div>
                                	<div class="btn-group">
                                    	<a href="{{ route('photo-edit', $photo->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                	</div>
                                	<small class="text-muted">{{ $photo->size}}</small>
                            	</div>
                        	</div>
                    	</div>
                	</div>
		        
            @endforeach
        </div>
    </div>
    @else
        <h3> No photo with this tag</h3>
    @endif
@endsection