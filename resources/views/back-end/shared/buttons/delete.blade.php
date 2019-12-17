<form action="{{ route($routeName. '.destroy' , ['id'=>$row]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit" rel="tooltip" title="Remove {{ $module }}" class="btn btn-white btn-link btn-sm">
        <i class="material-icons">close</i>
    </button>
</form>
