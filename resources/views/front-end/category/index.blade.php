@extends('layouts.app')

@section('content')
<div class="section section-buttons">
        <div class="container">
                <div class="title">
                    <h2>{{ $cat->name }}</h2>
                </div>
                @include('front-end.shared.video-row')
        </div>
</div>
@endsection
