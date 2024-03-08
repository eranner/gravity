@include('partials.header')
@include('partials.navbar')
<div style="display:flex; flex-direction:column; align-items: center; margin-top: 50px;">
<form class="finalOrderPage" action="{{route('placeOrder')}}" method="post">
    @csrf
<input type="hidden" value="{!!$orderDetails!!}" name="finalOrderDetails">
<input type="hidden" value="{{floatVal($orderTotal)}}" name="finalOrderTotal">


    <div >
        <h2 style="text-align:center; margin-bottom: 20px;">Order Summary</h2>
        <p style="line-height: .70; margin-bottom: 10px; text-align: right; border-bottom: 2px solid #333;">{!! nl2br($orderDetails) !!}</p>
            <div class="orderDetails">
                <p>Sub-Total: ${{$orderTotal}}</p>
                <p>Tax: ${{number_format(round(floatVal($orderTotal * 0.06), 2), 2)}}</p>
                <p>Total: ${{number_format(floatVal($orderTotal) + floatVal($orderTotal * 0.06), 2)}}</p>
            </div>
    </div>
    <button class="btn btn-success" style='max-width: 150px; margin: auto;'>Place Order</button>

</div>
</form>
</div>
@include('partials.footer')