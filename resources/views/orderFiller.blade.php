@include('partials.header')
@include('partials.navbar')
<div class="container" style="margin-top: 50px;">
    <h2 class="login-header" style="text-align: center;">Current Orders</h2>
@if($empty->isEmpty())
<h2 style="font-family: gravity; text-align:center;">There are no current orders.</h2>
@else
<div class="table-responsive">
<table class="table">
<tr>
    <th>Order #</th>
    <th>Customer Name</th>
    <th>Order</th>
    <th>Placed At</th>
    <th>Order Total</th>
    <th>Completed</th>
</tr>

@foreach($orders as $order)
@if (!$order->complete)
<tr>
    <td>{{$order->id}}</td>
    <td>{{$order->customer_name}}</td>
    <td>{{$order->order}}</td>
    <td>{{$order->created_at}}</td>
    <td>${{$order->price}}</td>
    <td><form action="{{ route('completeOrder', ['id' => $order->id])}}" method="POST">
        @csrf
        @method('PUT')
        <button class="btn btn-success" type='submit'>Completed</button></form></td>
</tr>
@endif
@endforeach
</table>
</div>
@endif
</div>
@include('partials.footer')
</form>
