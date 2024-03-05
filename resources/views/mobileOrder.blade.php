@include('partials.header')
@include('partials.navbar')
<?php $sizes = ["S", "M", "L"]; ?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<div id="app" class="container">
    <h2 class="categoryLabel">Build Your Order</h2>
    <div class="hardIceCreamOrderForm">
        <h3>Hard Ice Cream:</h3>
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
        <h3>Soft Serve:</h3>

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
        <h3>Toppings:</h3>

        <label class="form-label mb-3">Add Toppings</label>
        <select v-model="topping.toppingName" class="form-select mb-3" style="max-width: 300px;">
            @foreach ($toppings as $topping)
                <option  value="{{ $topping->topping }}">{{ $topping->topping }}</option>
            @endforeach
        </select>
        <button @click="buildToppingOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
    </div>



    <div class="finalOrder">
        <label class="form-label">Review Order</label>
        <input type="text" v-model="orderForm" class="form-control">
        <label class="form-label">Order Total:</label>

    </div>
    <input type="text" v-model="price">

    <button @click="clearOrder" class="btn btn-danger">Start Over</button>
</div>
@include('partials.footer')

<script>
    const app = Vue.createApp({
        data() {
            return {
                selectedFlavor: '',
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
                special: {
                    specialCount:0,
                    specialChoice: ''
                },
                softServe: {
                    softServeSize: '',
                    softServeFlavor: '',
                    softServeCost: 0,
                    softServeConeCup: 'cup'
                }
            };
        },
        methods: {
            buildToppingOrder() {
                this.price += this.topping.toppingPrice
                this.orderForm += ` ${this.topping.toppingName} `;
                this.price = parseFloat(this.price.toFixed(2));
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
                this.orderForm += `${this.softServe.softServeSize} ${this.softServe.softServeFlavor} Soft Serve in a ${this.softServe.softServeConeCup}`
                this.softServe.softServeFlavor = ''
                this.softServe.softServeSize = ''
            },

            buildScoopOrder(){
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

                this.price += parseFloat((this.scoops * this.scoopPrice).toFixed(2));
                this.orderForm += `${this.scoops} ${this.scoop} ${this.selectedFlavor} in a ${this.coneCup}`
                this.scoops = 0
                this.selectedFlavor = ''
            },
            clearOrder() {
                this.orderForm = ''
                this.price = 0
            },
        }
    });

    app.mount('#app');
</script>
