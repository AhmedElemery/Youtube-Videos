@extends('back-end.layout.app')

@section('title')
   {{ $pageTitle }}
@endsection


@section('content')

    @component('back-end.layout.header' , ['nav_title' =>  $pageTitle ])
        
    @endcomponent


 @component('back-end.shared.edit' , ['pageTitle' =>  $pageTitle , 'pageDesc'=> $pageDesc ])
     <div class="card-body">
        <form action="{{ route($folderName. '.update' , ['id' => $row ]) }}"  method="post">
            {{ method_field('put') }}
            @include('back-end.'. $folderName .'.form')
            
            <button type="submit" class="btn btn-primary pull-right">Update {{ $module }}</button>
            <div class="clearfix"></div>
        </form>
    </div>
 @endcomponent
@endsection