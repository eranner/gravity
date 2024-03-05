@include('partials.header')
@include('partials.navbar')

<div class="container mb-4">
    <div class="welcomesign">Gravity Ice Cream</div>
    <div class="frontFacingMenu">
        <div class="iceCreamFlavors iceGrid">
            <h6 class="categoryLabel">Hard Ice Creams</h6>
            <div class="hardIceFlavors">
                @foreach($flavors as $key=>$flavor)
                @if ($flavor->in_stock)
                <div class="flavorName" style="{{$key%2 != 0 ? 'color:white;text-shadow:1px 1px #333;' : '' }}">{{$flavor->flavor}}</div>
                @endif
                @endforeach
            </div>

        </div>
        <div class="iceCreamToppings iceGrid">
            <h6 class="categoryLabel">Toppings</h6>
            @foreach ($toppings as $key=>$topping)
            @if ($topping->in_stock)
            <div class="flavorName" style="{{$key%2 != 0 ? 'color:white;text-shadow:1px 1px #333;' : '' }}">{{$topping->topping}}</div>
            @endif
            @endforeach
        </div>
        <div class="softserve iceGrid">
            <h6 class="categoryLabel">Soft Serve</h6>
            @foreach ($softServes as $key => $softServe)
            @if ($softServe->in_stock)
            <div class="flavorName" style="{{$key%2 != 0 ? 'color:white;text-shadow:1px 1px #333;' : '' }}">{{$softServe->flavor}}</div>
            @endif
            @endforeach
        </div>
        <div class="shakes iceGrid">
            <h6 class="categoryLabel">Shakes</h6>
            <div class="hardIceFlavors">
            @foreach ($shakes as $key=>$shake)
            @if ($shake->in_stock)
            <div class="flavorName" style="{{$key%2 != 0 ? 'color:white;text-shadow:1px 1px #333;' : '' }}">{{$shake->shake}}</div>
            @endif
            @endforeach
            </div>
        </div>
        <div class="specials iceGrid">
            <h6 class="categoryLabel">Specials</h6>
            <div class="specialsItems">
                @foreach ($specials as $key => $special)
                @if ($special->in_stock)
                <div class="flavorName" style="{{$key%2 != 0 ? 'color:white;text-shadow:1px 1px #333;' : '' }}">{{$special->special}}</div>
                @endif
                @endforeach
            </div>
            </div>

    </div>
</div>

@include('partials.footer')