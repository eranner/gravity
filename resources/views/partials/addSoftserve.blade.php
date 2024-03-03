<div class="main-flavor-add">
    <div class="addFlavorContainer mb-5 mt-5">
        <h5>Add New Soft Serve To The Inventory Database</h5>
<form action="/add/softServe" method="post">
    @csrf
    <label for="flavor">Soft Serve:</label>
    <input type="text" name="flavor" required>
    
    <label for="in_stock">In Stock:</label>
    <input type="checkbox" name="in_stock" value="1" checked>
    
    <button type="submit">Add Soft Serve</button>
</form>
</div>
<div class="menu">
<div class="in-stock mb-5">
    <h3>Soft Serve Inventory:</h3>

        @foreach ($softServes as $softServe)
    @if ($softServe->in_stock)
    <div class="flavorCard">{{$softServe->flavor}}<form method="POST" action="{{route('refreshSoftServe', ['id' => $softServe->id])}}">
        @csrf
        @method('PUT')
    <input type="submit" value="Out of Stock" class="btn btn-danger">
    </form></div>
    

    @endif
    @endforeach
    
</div>
<div class="out-of-stock">
    <h3>Out of Stock:</h3>
    <p>Click on special to add back into the "In Stock Soft Serves"</p>
    <p style="color:red;">
    @foreach ($softServes as $softServe)
    @if (!$softServe->in_stock)
    <form method="POST" action="{{ route('updateSoftServe', ['id' => $softServe->id]) }}">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-danger" type="submit" >{{ $softServe->flavor }}</button>
    @endif
    @endforeach
</p>
</div>
</div>
</div>