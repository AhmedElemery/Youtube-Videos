<div class="card">
    <a href="{{ route('frontend.video' , ['id' => $video->id]) }}" title="{{  $video->name }}">
        <img src="{{ asset('uploads/' . $video->image) }}" alt={{ $video->name }}
        class="card-img-top mb-4" style="max-height:200px;">
    </a>
    <div class="card-body">
           <p class="card-text">
             <a  href="{{ route('frontend.video' , ['id' => $video->id]) }}"  title="{{  $video->name }}"> {{  $video->name }}</a>
           </p>
        <small>{{  $video->created_at }}</small>
    </div>
</div>
