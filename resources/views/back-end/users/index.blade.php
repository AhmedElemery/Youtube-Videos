@extends('back-end.layout.app')


@section('title')
   {{ $pageTitle }}
@endsection


@section('content')

    @component('back-end.layout.header' , ['nav_title' =>  $pageTitle ])

    @endcomponent

    @component('back-end.shared.table' , ['pageTitle'=>$pageTitle , 'pageDesc'=>$pageDesc])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{ route($routeName. '.create') }}" class="btn btn-white btn-round">Add {{ $module }}</a>
            </div>
        @endslot

        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>User Type</th>
                <th class="text-center">Control</th>
                </thead>
                <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->group }}</td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $rows->links() !!}
        </div>
    @endcomponent



@endsection
