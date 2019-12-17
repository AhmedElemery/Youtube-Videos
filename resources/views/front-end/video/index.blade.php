@extends('layouts.app')

@section('content')
<div class="section section-buttons">
        <div class="container">
                <div class="title">
                    <h1>{{ $video->name }}</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $url = getYoutubeId($video->youtube);
                        @endphp

                        @if ($url)
                            <iframe width="100%" height="500px;" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe><br><br><br>
                        @endif
                    </div>
                </div>

                <div class="title">
                    <h2>Video Details</h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>Published By : <strong>{{ $video->user->name }}</strong></p>
                        <p>Published at : <strong>{{ $video->created_at }}</strong></p>
                        <p>Details : <strong>{{ $video->desc }}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <p>Category  : <strong><a href="{{ route('frontend.category' ,['id' => $video->cat->id]) }}">
                          {{ $video->cat->name }}</strong></a></p>
                        <p>Skill  : <strong>
                            @foreach ($video->skills  as $skill)
                                <a href="{{ route('frontend.skill' ,['id' => $skill->id]) }}">
                                {{ $skill->name }}</a>
                            @endforeach
                            </strong></p>
                        <p>Tag  : <strong>
                            @foreach ($video->tags  as $tag)
                                <a href="{{ route('frontend.tag' ,['id' => $tag->id]) }}">
                                {{ $tag->name }}</a>
                            @endforeach
                            </strong></p>
                    </div>
                </div>
                <hr>
                 <div class="row" id="comments">
                    <div class="col-md-12">

                        <div class="card">
                        <div class="card-header">
                              <p><strong>Comments : </strong></p>
                        </div>
                            <div class="card-body">
                                <div class="card-block">
                                    @foreach ($video->comments as $comment)
                                    <div class="row">
                                        <div class="col-md-8">
                                             <i class="nc-icon nc-chat-33">{{ $comment->user->name }}</i>
                                        </div>
                                        <div class="col-md-4">
                                            <span>
                                                 <i class="nc-icon nc-calendar-60">{{ $comment->created_at }}</i>
                                            </span>
                                            @if (auth()->user())
                                                @if (auth()->user()->group == 'admin' || auth()->user()->id == $comment->user->id)
                                                    <span>
                                                        <a href=""  onclick="$('.form-edit').toggleClass('hidden').slideToggle(1000); return false;"
                                                        class="btn btn-outline-info btn-round pull-right">edit</a>
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-12"><hr><br></div>
                                        <div class="col-md-8">
                                             <p>{{ $comment->comment }}</p><br>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="hidden form-edit">
                                            <form action="{{ route('frontend.commentUpdate' , ['id' => $comment->id]) }}" method="post">
                                               {{ csrf_field() }}
                                                <textarea rows="3" name="comment" class="form-control">{{ $comment->comment }}</textarea><br>
                                                <div>
                                                 <button type="submit"  class="btn btn-outline-danger btn-round pull-right">Edit Comment</button>
                                                </div>
                                            </form>
                                          </div>

                                        </div>
                                    </div>

                                        @if (!$loop->last)
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

             @if (auth()->user())
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                              <p><strong>Add Comment : </strong></p>
                        </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <div>
                                        <form action="{{ route('frontend.commentStore' , ['id' => $video->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <textarea rows="3" name="comment" class="form-control"
                                            placeholder="..... Enter Your Comment Here"></textarea><br>
                                            <div>
                                                <button type="submit"  class="btn btn-outline-danger btn-round pull-right">Add Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
</div>
@endsection
