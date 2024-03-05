@include('partials.header')
@include('partials.navbar')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<div id="app" class="container">
    <h2 class="categoryLabel">Build Your Order</h2>
    <div class="hardIceCreamOrderForm">
        <label class="form-label mb-3">Scoops</label>
        <select v-model="scoops" class="form-select mb-3" style="max-width: 100px;">
            @for ($i = 0; $i <10; $i++)
            <option value={{$i + 1}}>{{$i + 1}}</option>
            @endfor
        </select>
        <label class="form-label mb-3">Flavor</label>
        <select v-model="selectedFlavor" class="form-select mb-3" style="max-width: 300px;">
            @foreach ($flavors as $flavor)
                <option  value="{{ $flavor->flavor }}">{{ $flavor->flavor }}</option>
            @endforeach
        </select>
        <button @click="buildScoopOrder" class='btn mb-3' style='background:rgb(181, 114, 181);'>Add</button>
    </div>

    <div class="hardIceCreamOrderForm">
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
                    softServeCost: 0
                }
            };
        },
        methods: {
            buildToppingOrder() {
                this.price += this.topping.toppingPrice
                this.orderForm += ` ${this.topping.toppingName} `;
                this.price = parseFloat(this.price.toFixed(2));
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
                this.orderForm += `${this.scoops} ${this.scoop} ${this.selectedFlavor}`
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
