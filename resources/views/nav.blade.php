<nav id='main-nav' class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a id='main-logo' class="navbar-brand" href="{{ url('/') }}">LaraForum !</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      @if(!Auth::check())
      <li><a href="{{ url('member/login') }}">Login</a></li>
      <li><a href="{{ url('member/register') }}">Register</a></li>
      @else
      @if(Auth::user()->admin == 1)
      <li>
        <a href="{{ url('admin') }}"><span class='glyphicon glyphicon-list-alt' aria-hidden="true"></span> Admin</a>
      </li>
      @endif
      <li>
        <a href="{{ url('profile', Auth::user()->slug) }}">
          <span class='glyphicon glyphicon-user' aria-hidden="true"></span>{{Auth::user()->name}}</a>
        </li>
        <li>
          <a href="{{ url('member/logout') }}"><span class='glyphicon glyphicon-log-out' aria-hidden="true"></span> Logout</a>
        </li>
        @endif
      </ul>
    </div>
  </nav>