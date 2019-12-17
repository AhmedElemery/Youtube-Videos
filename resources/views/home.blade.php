@extends('layouts.app')

@section('content')
<div class="section section-buttons">
        <div class="container">
                <div class="title">
                    <h2>Latest Videos</h2>
                    <br>
                    
                    @if(request()->has('search') && request()->get('search') != '')
                        <p>You are searched on <b>{{ request()->get('search') }}</b>  || 
                         <a href="{{ route('home') }}">Reset</a>
                        </p>
                    @endif
                </div>
                @include('front-end.shared.video-row')
        </div>
</div>
@endsection
