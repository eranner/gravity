@include('partials.header')
@include('partials.navbar')
<div style="display:flex; flex-direction:column; align-items: center; margin-top: 50px;">
<form class="finalOrderPage" action="{{route('stripePayment')}}" method="post" id="orderForm">
    @csrf
<input type="hidden" value="{!!$orderDetails!!} + 6% PA sales tax" name="finalOrderDetails">
<input type="hidden" value="{{number_format(floatVal($orderTotal) + floatVal($orderTotal * 0.06), 2)}}" name="finalOrderTotal">


    <div >
        <h2 style="text-align:center; margin-bottom: 20px;">Order Summary</h2>
        <p style="line-height: .70; margin-bottom: 10px; text-align: right; border-bottom: 2px solid #333;">{!! nl2br($orderDetails) !!}</p>
            <div class="orderDetails">
                <p>Sub-Total: ${{$orderTotal}}</p>
                <p>Tax: ${{number_format(round(floatVal($orderTotal * 0.06), 2), 2)}}</p>
                <p>Total: ${{number_format(floatVal($orderTotal) + floatVal($orderTotal * 0.06), 2)}}</p>
            </div>
    </div>
    <label for="customerName" class="form-label mb-3">Customer Name</label>
    <input type="text" name="customerName" class='form-control mb-3' required>
    <button class="btn btn-success" style='max-width: 150px; margin: auto;' id="orderButton">Place Order</button>

</div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let orderButton = document.getElementById('orderButton')
        orderButton.addEventListener('click',()=> {
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            fetch("{{route('placeOrder')}}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-CSRF-TOKEN": csrfToken

                },
                body: new URLSearchParams(new FormData(document.getElementById("orderForm"))),
            })
            .then(function (response) {
                    if (!response.ok) {
                        throw new Error("Error placing order");
                    }
                    return response.json();
                })
                .then(function (orderResponse) {
                    console.log("Order placed successfully:", orderResponse);
                })
        })
    })
</script>
</div>
@include('partials.footer')
