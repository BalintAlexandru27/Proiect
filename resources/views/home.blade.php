@extends('layouts.app')

@section('content')
<div class="container">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<style>
body { 
    background-attachment:fixed; 
    background-image:url('../storage/poza2.png');
    background-position:center 200px top 1000px;  
    /*background-repeat:no-repeat;*/
    height:1000px; 
}
</style>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to Photoshow') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
