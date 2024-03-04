<div class="main-flavor-add">
    <div class="addFlavorContainer mb-5 mt-5">
        <h5>Add New Shake To The Inventory Database</h5>
<form action="/add/shake" method="post">
    @csrf
    <label for="shake">Shake:</label>
    <input type="text" name="shake">
    
    <label for="in_stock">In Stock:</label>
    <input type="checkbox" name="in_stock" value="1" checked>
    
    <button type="submit">Add Shake</button>
</form>
</div>
<div class="menu">
<div class="in-stock mb-5">
    <h3>Shake Inventory:</h3>

        @foreach ($shakes as $shake)
    @if ($shake->in_stock)
    <div class="flavorCard">{{$shake->shake}}<form method="POST" action="{{route('refreshShake', ['id' => $shake->id])}}">
        @csrf
        @method('PUT')
    <input type="submit" value="Out of Stock" class="btn btn-danger">
    </form></div>
    

    @endif
    @endforeach
    
</div>
<div class="out-of-stock">
    <h3>Out of Stock:</h3>
    <p>Click on flavor to add back into the "In Stock Shakes"</p>
    <p style="color:red;">
    @foreach ($shakes as $shake)
    @if (!$shake->in_stock)
    <form method="POST" action="{{ route('updateShake', ['id' => $shake->id]) }}">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-danger" type="submit" >{{ $shake->shake }}</button>
    @endif
    @endforeach
</p>
</div>
</div>
</div>