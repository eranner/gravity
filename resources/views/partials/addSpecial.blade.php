<div class="main-flavor-add">
    <div class="addFlavorContainer mb-5 mt-5">
        <h5>Add New Special To The Inventory Database</h5>
<form action="/add/special" method="post">
    @csrf
    <div class="formInputs">
        <div>
            <label for="special">Special:</label>
            <input type="text" name="special">
        </div>
        <div>
            <label for="in_stock">In Stock:</label>
            <input type="checkbox" name="in_stock" value="1" checked>
        </div>
        <button class="btn btn-success" type="submit">Add Special</button>

    </div>

    
    
    
</form>
</div>
<div class="menu">
<div class="in-stock mb-5">
    <h3>Specials Inventory:</h3>

        @foreach ($specials as $special)
    @if ($special->in_stock)
    <div class="flavorCard">{{$special->special}}<form method="POST" action="{{route('refreshSpecial', ['id' => $special->id])}}">
        @csrf
        @method('PUT')
    <input type="submit" value="Out of Stock" class="btn btn-danger">
    </form></div>
    

    @endif
    @endforeach
    
</div>
<div class="out-of-stock">
    <h3>Out of Stock:</h3>
    <p>Click on special to add back into the "In Stock Specials"</p>
    <p style="color:red;">
    @foreach ($specials as $special)
    @if (!$special->in_stock)
    <form method="POST" action="{{ route('updateSpecial', ['id' => $special->id]) }}">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-danger" type="submit" >{{ $special->special }}</button>
    @endif
    @endforeach
</p>
</div>
</div>
</div>