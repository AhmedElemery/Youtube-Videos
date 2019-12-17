<form action="{{ route('comments.store') }}" method="post">
    {{ csrf_field() }}
    @include('back-end.comments.form')

    <input type="hidden" value="{{ $row->id }}" name="video_id">

    <div>
        <button type="submit" class="btn btn-primary pull-right">Create Comment</button>
    </div>
</form>
