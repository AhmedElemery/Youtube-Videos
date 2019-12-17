@extends('layouts.app')

@section('content')
<div class="section section-buttons text-center" style="min-height:560px;">
        <div class="container">
                <div class="title">
                    <h2>{{ $page->name }}</h2>
                </div>
                <div>
                    <p>{{ $page->desc }}</p>
                </div>
        </div>
</div>
@endsection
