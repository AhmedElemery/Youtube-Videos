<nav class="navbar navbar-expand-lg fixed-top bg-danger ">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip"   data-placement="bottom">
          Youtube Videos
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
       <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">

            <li class="nav-item">
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                        id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true"
                         aria-expanded="true">Categories</a>

                        <div class="dropdown-menu">
                            @foreach ($categories as $category)
                                 <a class="dropdown-item"
                                 href="{{ route('frontend.category' , ['id' =>  $category->id]) }}">
                                 {{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
            </li>
            <li class="nav-item">
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                        id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true"
                         aria-expanded="true">Skills</a>

                        <div class="dropdown-menu">
                            @foreach ($skills as $skill)
                                 <a class="dropdown-item" href="{{ route('frontend.skill', ['id' =>  $skill->id]) }}">
                                 {{ $skill->name }}</a>
                            @endforeach
                        </div>
                    </div>
            </li>

             @guest
                <li class="nav-item">
                    <a class="nav-link"  title="Login"  href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  title="register"  href="{{ url('/register') }}">Register</a>
                </li>

            @else

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li>
                <form class="form-inline ml-auto" style="margin-top:15px;" action="{{ route('home') }}">
                    <div class="input-group form-group-no-border">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color:#ec8452;">
                        <i class="nc-icon nc-zoom-split"></i>
                        </span>
                    </div>
                    <input type="text" name="search" class="form-control" placeholder="search">
                    </div>
                </form>
            </li>
        </ul>
      </div>
    </div>
  </nav>
