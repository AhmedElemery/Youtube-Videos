@extends('layouts.app')

@section('content')

  <div class="page-header section-dark" style="background-image: url('/frontend/img/antoine-barres.jpg')">
            <div class="filter"></div>
            <div class="content-center">
            <div class="container">
                <div class="title-brand">
                <h1 class="presentation-title">Youtube Videos</h1>
                <div class="fog-low">
                    <img src="/frontend/img/fog-low.png" alt="">
                </div>
                <div class="fog-low right">
                    <img src="/frontend/img/fog-low.png" alt="">
                </div>
                </div>
                <h2 class="presentation-subtitle text-center">Upload Your Youtube Videos</h2>
            </div>
            </div>
            <div class="moving-clouds" style="background-image: url('/frontend/img/clouds.png'); "></div>
      </div>


        {{--  start latest videos  --}}

        <div class="main">
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title" style="color:#e45511; font-size:50px;"><i class="nc-icon nc-bulb-63"></i>Latest Videos</h1>
            <br>

                
          </div>
        </div>
        <br>
        <div class="row">
          @foreach ($videos as $video)
            <div class="col-md-4">
               <div class="card">
                <img src="{{ asset('uploads/' . $video->image) }}" alt={{ $video->name }}
                 class="card-img-top mb-4" style="max-height:200px;" >
                  <div class="card-body">
                        <p class="card-text">
                            {{  $video->name }}
                        </p>
                        <small>{{  $video->created_at }}</small>
                    </div>
               </div>
            </div>

          @endforeach
            <br>
            <div class="col-md-12 text-center">
                <a href="{{ route('home') }}" class="btn btn-danger btn-round">More Videos</a>
            </div>
        </div>
      </div>
    </div>
    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title">Our Numbers</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card   card-plain">
              <div class="card-body">
                <div class="comments">
                    <h2 class="card-title"><i class="nc-icon nc-bulb-63"></i>  {{ $comments_count }}</h3>
                    <br>
                    <h2>Comments</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card   card-plain">
              <div class="card-body">
                <div class="comments">
                    <h2 class="card-title"><i class="nc-icon nc-bullet-list-67"></i>  {{ $skills_count }}</h3>
                    <br>
                    <h2>Skills</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card   card-plain">
              <div class="card-body">
                <div class="comments">
                    <h2 class="card-title"><i class="nc-icon nc-caps-small"></i>  {{ $tags_count }}</h3>
                    <h2>Tags</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

        {{--  end latest videos  --}}


      <div class="section landing-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center" style="font-size:70px;"><b>Keep in touch?</b></h2>
            <form class="contact-form" action="{{ route('contact.store') }}" method="post">
             {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <label>Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    @php
                        $input = 'name';
                    @endphp
                    <input type="text" class="form-control @error($input) is-invalid @enderror" placeholder="Name" name="{{ $input }}" required>
                     @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-email-85"></i>
                      </span>
                    </div>
                     @php
                        $input = 'email';
                    @endphp
                    <input type="email" name="{{ $input }}" class="form-control  @error($input) is-invalid @enderror" placeholder="Email" required>
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
               @php
                    $input = 'message';
                @endphp
              <label>Message</label>
              <textarea class="form-control  @error($input) is-invalid @enderror" name="{{ $input }}" rows="4" placeholder="Tell us your thoughts and feelings..." required></textarea>
                @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                  <button class="btn btn-danger btn-lg btn-fill">Send Message</button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
</div>
@endsection
