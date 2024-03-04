<div class="main-flavor-add">
    <div class="addFlavorContainer mb-5 mt-5">
        <h5>Add New Flavor To The Inventory Database</h5>
<form action="/add/flavor" method="post">
    @csrf
    <label for="flavor">Flavor:</label>
    <input type="text" name="flavor">
    
    <label for="in_stock">In Stock:</label>
    <input type="checkbox" name="in_stock" value="1" checked>
    
    <button type="submit">Add Flavor</button>
</form>
</div>
<div class="menu">
<div class="in-stock mb-5">
    <h3>Flavor Inventory:</h3>

        @foreach ($flavors as $flavor)
    @if ($flavor->in_stock)
    <div class="flavorCard">{{$flavor->flavor}}<form method="POST" action="{{route('refresh', ['id' => $flavor->id])}}">
        @csrf
        @method('PUT')
    <input type="submit" value="Out of Stock" class="btn btn-danger">
    </form></div>
    

    @endif
    @endforeach
    
</div>
<div class="out-of-stock">
    <h3>Out of Stock:</h3>
    <p>Click on flavor to add back into the "In Stock Flavors"</p>
    <p style="color:red;">
    @foreach ($flavors as $flavor)
    @if (!$flavor->in_stock)
    <form method="POST" action="{{ route('updateStock', ['id' => $flavor->id]) }}">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-danger" type="submit" >{{ $flavor->flavor }}</button>
    @endif
    @endforeach
</p>
</div>
</div>
</div>