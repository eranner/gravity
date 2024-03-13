<div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{route('main')}}" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="{{route('mobileorders')}}" class="nav-link px-2 text-body-secondary">Mobile Orders</a></li>
        <li class="nav-item"><a href="{{ auth()->check() ? route('dashboard') : route('login')}}" class="nav-link px-2 text-body-secondary">{{auth()->check() ?  'Inventory' :  'Login'}}</a></li>
        <li class="nav-item"><a href="{{ auth()->check() ? route('orderFiller') : route('login')}}" class="nav-link px-2 text-body-secondary">{{auth()->check() ?  'Orders' :  ''}}</a></li>
        @if(auth()->check())
        <li class="nav-item"><a href="{{route('logout')}}" class="nav-link px-2 text-body-secondary">Logout</a></li>
        @endif
      </ul>
      <p class="text-center text-body-secondary">&copy; <?php echo date('Y');?> <a href="https://eranner.website/ej/">EJ Web Design</p>
    </footer>
  </div>
</body>
</html>