@extends('back-end.layout.app')

@section('title')
   {{ $pageTitle }}
@endsection


@section('content')

    @component('back-end.layout.header' , ['nav_title' =>  $pageTitle ])

    @endcomponent


 @component('back-end.shared.edit' , ['pageTitle' =>  $pageTitle , 'pageDesc'=> $pageDesc ])
     <div class="card-body">
        <form action="{{ route('videos.update' , ['id' => $row->id ]) }}"  method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            @include('back-end.'. $folderName .'.form')

            <button type="submit" class="btn btn-primary pull-right">Update {{ $module }}</button>
            <div class="clearfix"></div>
        </form>
        @slot('md4')

        @php
            $url = getYoutubeId($row->youtube);
        @endphp

        @if ($url)
            <iframe width="300" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0"
             allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
             allowfullscreen></iframe><br><br><br>
        @endif
        <img src="{{ asset('uploads/'.$row->image) }}" width="300px" height="250px">
        @endslot
    </div>

 @endcomponent

  @component('back-end.shared.edit' , ['pageTitle' => 'Comments' , 'pageDesc'=> 'Here you can control Comments' ])
            @include('back-end.comments.index')
        @slot('md4')
            @include('back-end.comments.create')
        @endslot

 @endcomponent

    
    

@endsection
