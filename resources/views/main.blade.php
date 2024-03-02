@include('partials.header')
@include('partials.navbar')

<div class="container">
    <div class="welcomsign"></div>
    <div class="frontFacingMenu">
        <h4 class="gravityMenu">Today's Menu</h4>
        <div class="iceCreamFlavors">
            <h6 class="categoryLabel">Hard Ice Creams</h6>
            @foreach($flavors as $flavor)
            @if ($flavor->in_stock)
            <div class="flavorName">{{$flavor->flavor}}</div>
            @endif
            @endforeach
        </div>
        <div class="iceCreamToppings">
            <h6 class="categoryLabel">Toppings</h6>
            @foreach ($toppings as $topping)
            @if ($topping->in_stock)
            <div class="flavorName">{{$topping->topping}}</div>
            @endif
            @endforeach
        </div>
        <div class="softserve"></div>
        <div class="shakes"></div>
        <div class="specials"></div>
    </div>
</div>

@include('partials.footer')