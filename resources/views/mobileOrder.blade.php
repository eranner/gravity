@include('partials.header')
@include('partials.navbar')
<?php $sizes = ["S", "M", "L"]; ?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<div id="app" class="container">
    <h2 class="categoryLabel" style="text-align: center; margin-top: 30px;">Build Your Order</h2>
    <div class="orderWrapper">
        <div class="hardIceCreamOrderForm">
            <h5>Hard Ice Cream:</h5>
            <label class="form-label mb-3">Scoops</label>
            <select v-model="scoops" class="form-select mb-3" style="max-width: 100px;">
                @for ($i = 0; $i <10; $i++)
                <option value={{$i + 1}}>{{$i + 1}}</option>
                @endfor
            </select>
            <label class="form-label mb-3">Flavor</label>
            <select v-model="selectedFlavor" class="form-select mb-3" style="max-width: 300px;">
                @foreach ($flavors as $flavor)
                    @if($flavor->in_stock)
                        <option  value="{{ $flavor->flavor }}">{{ $flavor->flavor }}</option>
                    @endif
                @endforeach
            </select>
            <label class="form-label mb-3">Cup/Cone?</label>
    
            <select v-model="coneCup" class="form-select mb-3" style="max-width: 100px;">
    
                <option value="cup">cup</option>
                <option value="cone">cone</option>
    
            </select>
            <button @click="buildScoopOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
        </div>
    
    <div class="hardIceCreamOrderForm">
        <h5>Soft Serve:</h5>

        <label class="form-label mb-3">Size</label>
        <select v-model="softServe.softServeSize" class="form-select mb-3" style="max-width: 100px;">
            @foreach ($sizes as $size)
                <option  value="{{ $size }}">{{ $size }}</option>
            @endforeach
        </select>
        <label class="form-label mb-3">Flavor</label>
        <select v-model="softServe.softServeFlavor" class="form-select mb-3" style="max-width: 300px;">
            @foreach ($softServes as $softServe)
            @if($softServe->in_stock)
                <option  value="{{ $softServe->flavor }}">{{ $softServe->flavor }}</option>
            @endif
            @endforeach
        </select>
        <label class="form-label mb-3">Cup/Cone?</label>

        <select v-model="softServe.softServeConeCup" class="form-select mb-3" style="max-width: 100px;">

            <option value="cup">cup</option>
            <option value="cone">cone</option>

        </select>
        <button @click="buildSoftServeOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
    </div>
    <div class="hardIceCreamOrderForm">
        <h5>Toppings:</h5>

        <label class="form-label mb-3">Add Toppings</label>
        <select v-model="topping.toppingName" class="form-select mb-3" style="max-width: 300px;">
            @foreach ($toppings as $topping)
                <option  value="{{ $topping->topping }}">{{ $topping->topping }}</option>
            @endforeach
        </select>
        <button @click="buildToppingOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
    </div>
    <div class="hardIceCreamOrderForm">
        <h5>Shakes:</h5>

        <label class="form-label mb-3">Size</label>
        <select v-model="shake.size" class="form-select mb-3" style="max-width: 100px;">
            @foreach ($sizes as $size)
                <option  value="{{ $size }}">{{ $size }}</option>
            @endforeach
        </select>
        <label class="form-label mb-3">Shake</label>
        <select v-model="shake.flavor" class="form-select mb-3" style="max-width: 300px;">
            @foreach ($shakes as $shake)
            @if($shake->in_stock)
                <option  value="{{ $shake->shake }}">{{ $shake->shake }}</option>
            @endif
            @endforeach
        </select>
        <button @click="buildShakeOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
    </div>
    <div class="hardIceCreamOrderForm">
        <h5>Specials:</h5>

        <label class="form-label mb-3">Special</label>
        <select v-model="special.name" class="form-select mb-3" style="max-width: 300px;">
            @foreach ($specials as $special)
            @if($special->in_stock)
                <option  value="{{ $special->special }}">{{ $special->special }}</option>
            @endif
            @endforeach
        </select>
        <button @click="buildSpecialOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
    </div>
    <form action="{{route('orderConfirmation')}}" method="post">

    <div class="finalOrder">
        <label class="form-label">Review Order</label>
        <textarea type="text" v-model="orderForm" disabled=true class="form-control" rows=12></textarea>
        <input type="hidden" name="orderDetails" v-model="orderForm">

    </div>
    <div class="orderTotal">
            @csrf
        <label class="form-label" style="font-size: 2.5rem; border-bottom: 3px solid black;">Order Total:</label>
        <div style="display:flex; justify-content: center;">
            <p style="font-size: 3rem; color: green;">$</p>
            <input type="text" disabled=true v-model="finalTotal" class="form-control" style="max-width: 250px; font-size:3rem; text-align:center; background: transparent; border:none; color: green; text-shadow:2px 2px #333;">
            <input type="hidden" name="orderTotal" v-model="finalTotal">
        </div>

        <div class="submissionButtonsContainer">
            <button @click="clearOrder" class="btn btn-danger" type='button' style="max-width:300px; text-shadow: 1px 1px #333;">Start Over</button>
            <button type="submit" class="btn btn-success" style="max-width:300px; text-shadow: 1px 1px #333;">Place Order</button>
        </div>
    </form>
    </div>
</div>

</div>
@include('partials.footer')

<script>
    const app = Vue.createApp({
        data() {
            return {
                selectedFlavor: '',
                finalTotal: '',
                scoops: 0,
                coneCup: 'cup',
                orderForm : '',
                scoop: 'scoop',
                scoopPrice: 1.49,
                price: 0,
                scoopCount: 0,
                topping: {
                    toppingCount: 0,
                    toppingName: '',
                    toppingPrice: .50,
                    toppingTotal : 0
                },
                softServe: {
                    softServeSize: '',
                    softServeFlavor: '',
                    softServeCost: 0,
                    softServeConeCup: 'cup'
                },
                shake: {
                    flavor: '',
                    size: '',
                    cost: '',
                },
                special: {
                    cost: 6.99,
                    name: ''
                }
            };
        },
        methods: {
            buildToppingOrder() {
                if(this.topping.toppingName == ''){
                    alert("Please choose a topping")
                    return ''
                }
                this.price += this.topping.toppingPrice
                this.orderForm += `     - Add ${this.topping.toppingName} $${this.topping.toppingPrice.toFixed(2)}\n`;
                this.price = parseFloat(this.price.toFixed(2));
                this.finalTotal = this.price.toFixed(2)
                this.topping.toppingName = ''
            },
            buildSpecialOrder() {
                if(this.special.name == ''){
                    alert("Please choose a special")
                    return ''
                }
                this.price += this.special.cost
                this.orderForm += `1 ${this.special.name} - $${this.special.cost.toFixed(2)}\n`
                this.price = parseFloat(this.price.toFixed(2));
                this.finalTotal = this.price.toFixed(2)

                this.special.name = ''
            },
            buildShakeOrder() {
                let cost = 0;
                if(this.shake.size == ''){
                    alert('Please choose a size')
                    return ''
                }
                if(this.shake.flavor == ''){
                    alert('Please choose a shake')
                    return ''
                }
                if(this.shake.size === "S"){
                    cost = 2.49
                    this.shake.cost =  parseFloat(cost.toFixed(2))
                } else if (this.shake.size === "M") {
                    cost = 3.99
                    this.shake.cost =  parseFloat(cost.toFixed(2))
                } else {
                    cost = 4.49
                    this.shake.cost =  parseFloat(cost.toFixed(2))
                }
                this.price +=   parseFloat(cost)
                this.finalTotal = this.price.toFixed(2)
                this.orderForm += `${this.shake.size} ${this.shake.flavor} Shake - $${this.shake.cost}\n`
                this.shake.flavor = ''
                this.shake.size = ''
            },
            buildSoftServeOrder(){
                let cost = 0;
                if(this.softServe.softServeSize == ''){
                    alert('Please choose a size')
                    return ''
                }

                if(this.softServe.softServeFlavor == ''){
                    alert('Please choose a flavor')
                    return ''
                }

                if(this.softServe.softServeSize === "S"){
                    cost = 1.49
                    this.softServe.softServeCost =  parseFloat(cost.toFixed(2))
                } else if (this.softServe.softServeSize === "M") {
                    cost = 2.74
                    this.softServe.softServeCost =  parseFloat(cost.toFixed(2))
                } else {
                    cost = 3.99
                    this.softServe.softServeCost =  parseFloat(cost.toFixed(2))
                }
                this.price +=   parseFloat(this.softServe.softServeCost)
                this.finalTotal = this.price.toFixed(2)

                this.orderForm += `${this.softServe.softServeSize} ${this.softServe.softServeFlavor} Soft Serve in a ${this.softServe.softServeConeCup} - $${this.softServe.softServeCost}\n`
                this.softServe.softServeFlavor = ''
                this.softServe.softServeSize = ''
            },

            buildScoopOrder(){
                let cost = 0;
                if(this.scoops > 1){
                    this.scoop = 'scoops'
                } else {
                    this.scoop = 'scoop'
                }

                if(this.selectedFlavor == ''){
                    alert("Please choose a flavor")
                    return ''
                }

                if(this.scoops < 1){
                    alert("Please select how many scoops you would like")
                    return ''
                }
                this.scoopCount += 1
                cost = this.scoops * this.scoopPrice
                // this.price += cost.toFixed(2)
                this.price += parseFloat(cost.toFixed(2));
                this.finalTotal = this.price.toFixed(2)

                this.orderForm += `${this.scoops} ${this.scoop} ${this.selectedFlavor} in a ${this.coneCup} - $${cost.toFixed(2)}\n`
                this.scoops = 0
                this.selectedFlavor = ''
            },
            clearOrder() {
                this.orderForm = ''
                this.price = 0
                this.finalTotal = ''
            },
        }
    });

    app.mount('#app');
</script>
