@include ('partials.header')
@include ('partials.navbar')
<div class="maincontainer container">
    <h2 class="login-header">Inventory Dashboard</h2>
    <div class="inventory-holders">
    @include('partials.addFlavor')
    @include('partials.addTopping')
    @include('partials.addShake')
    @include('partials.addSpecial')
    @include('partials.addSoftserve')
    </div>
</div>
@include ('partials.footer')
