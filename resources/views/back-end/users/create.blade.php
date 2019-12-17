@extends('back-end.layout.app')

@section('title')
   {{ $pageTitle }}
@endsection


@section('content')

    @component('back-end.layout.header' , ['nav_title' =>  $pageTitle ])
        
    @endcomponent

    @component('back-end.shared.create' , ['pageTitle' =>  $pageTitle  , 'pageDesc' => $pageDesc])
        <form action="{{ route($routeName.'.store') }}" method="post">
                    
                    @include('back-end.'. $folderName .'.form')
                    
                    <button type="submit" class="btn btn-primary pull-right">Create User</button>
                    <div class="clearfix"></div>
                </form>
    @endcomponent

@endsection