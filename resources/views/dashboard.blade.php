@include ('partials.header')
@include ('partials.navbar')
<div class="maincontainer container">
    <h2 class="mt-3">Main Dashboard</h2>
    <div class="inventory-holders">
    @include('partials.addFlavor')
    @include('partials.addTopping')
    @include('partials.addShake')
    @include('partials.addSpecial')
    @include('partials.addSoftServe')
    </div>
</div>
@include ('partials.footer')
