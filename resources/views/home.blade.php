@include ('partials.header')
<div class="maincontainer">
<form action="/add/flavor" method="post">
    @csrf
    <label for="flavor">Flavor:</label>
    <input type="text" name="flavor" required>
    
    <label for="in_stock">In Stock:</label>
    <input type="checkbox" name="in_stock" value="1" checked>
    
    <button type="submit">Add Flavor</button>
</form>
<div class="menu">
<div class="in-stock">
    <h3>Flavors</h3>

        @foreach ($flavors as $flavor)
    @if ($flavor->in_stock)
    <div class="flavorCard">{{$flavor->flavor}}<form method="POST" action="{{route('refresh', ['id' => $flavor->id])}}">
        @csrf
        @method('PUT')
    <input type="submit" value="Out of Stock">
    </form></div>
    

    @endif
    @endforeach
    
</div>
<div class="out-of-stock">
    <h3>Out of Stock:</h3>
    <p style="color:red;">
    @foreach ($flavors as $flavor)
    @if (!$flavor->in_stock)
    <form method="POST" action="{{ route('updateStock', ['id' => $flavor->id]) }}">
        @csrf
        @method('PUT')
        <button type="submit" style="color: red;">{{ $flavor->flavor }}</button>
    @endif
    @endforeach
</p>
</div>
</div>
<a href="{{route('login')}}"><button>Login</button></a>
<a href="{{route('logout')}}"><button>Logout</button></a>
</div>
@include ('partials.footer')
