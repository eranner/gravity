<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('main')}}">Gravity Ice Cream</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="{{route('main')}}">Home</a>
          <a class="nav-link" href="{{route('mobileorders')}}">Mobile Orders</a>
          <a class="nav-link" href="#">About Us</a>
          <a class="nav-link" href="{{ auth()->check() ? route('dashboard') : route('login')}}">
            {{auth()->check() ?  'Dashboard' :  'Login'}}
        </a>
        <a class="nav-link" href="{{ auth()->check() ? route('orderFiller') : route('login')}}">
            {{auth()->check() ?  'Orders' :  ''}}
        </a>
        @if(auth()->check())
        <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </div>
        @endif
      </div>
    </div>
  </nav>
