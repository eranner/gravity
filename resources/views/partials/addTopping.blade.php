<div class="main-flavor-add">
    <div class="addFlavorContainer mb-5 mt-5">
        <h5>Add New Topping To The Inventory Database</h5>
<form action="/add/topping" method="post">
    @csrf
    <div class="formInputs">
        <div>
            <label for="topping">Topping:</label>
            <input type="text" name="topping">
        </div>
        <div>
            <label for="in_stock">In Stock:</label>
            <input type="checkbox" name="in_stock" value="1" checked>
        </div>
        <button class="btn btn-success" type="submit">Add Topping</button>

    </div>

    

    
</form>
</div>
<div class="menu">
<div class="in-stock mb-5">
    <h3>Topping Inventory:</h3>

        @foreach ($toppings as $topping)
    @if ($topping->in_stock)
    <div class="flavorCard">{{$topping->topping}}<form method="POST" action="{{route('refreshTopping', ['id' => $topping->id])}}">
        @csrf
        @method('PUT')
    <input type="submit" value="Out of Stock" class="btn btn-danger">
    </form></div>
    

    @endif
    @endforeach
    
</div>
<div class="out-of-stock">
    <h3>Out of Stock:</h3>
    <p>Click on flavor to add back into the "In Stock Toppings"</p>
    <p style="color:red;">
    @foreach ($toppings as $topping)
    @if (!$topping->in_stock)
    <form method="POST" action="{{ route('updateTopping', ['id' => $topping->id]) }}">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-danger" type="submit" >{{ $topping->topping }}</button>
    @endif
    @endforeach
</p>
</div>
</div>
</div>