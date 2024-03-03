@include('partials.header')
@include('partials.navbar')

<div class="container">
    <div class="welcomsign"></div>
    <div class="frontFacingMenu">
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
        <div class="softserve">
            <h6 class="categoryLabel">Soft Serve</h6>
            @foreach ($softServes as $softServe)
            @if ($softServe->in_stock)
            <div class="flavorName">{{$softServe->flavor}}</div>
            @endif
            @endforeach
        </div>
        <div class="shakes">
            <h6 class="categoryLabel">Shakes</h6>
            @foreach ($shakes as $shake)
            @if ($shake->in_stock)
            <div class="flavorName">{{$shake->shake}}</div>
            @endif
            @endforeach
        </div>
        <div class="specials">
            <h6 class="categoryLabel">Specials</h6>
            @foreach ($specials as $special)
            @if ($special->in_stock)
            <div class="flavorName">{{$special->special}}</div>
            @endif
            @endforeach
        </div>
    </div>
</div>

@include('partials.footer')