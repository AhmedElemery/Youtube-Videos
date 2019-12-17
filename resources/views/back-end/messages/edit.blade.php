@extends('back-end.layout.app')

@section('title')
   {{ $pageTitle }}
@endsection


@section('content')

    @component('back-end.layout.header' , ['nav_title' =>  $pageTitle ])

    @endcomponent


 @component('back-end.shared.edit' , ['pageTitle' =>  $pageTitle , 'pageDesc'=> $pageDesc ])
     <div class="card-body">
            @include('back-end.'. $folderName .'.form')
        @slot('md4')

        <form action="{{ route('message.replay' , ['id'=> $row->id ]) }}" method="post">
            {{ csrf_field() }}
                @php
                $input = "message";
                @endphp
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Replay  Message</label><br><br>
                        <textarea name="{{ $input }}"  rows="5"
                        class="form-control @error($input) is-invalid @enderror" placeholder="Enter Your Replay Here"></textarea>
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Send Replay</button>
                <div class="clearfix"></div>
        </form>

        @endslot
    </div>
 @endcomponent
@endsection
