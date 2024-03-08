@include('partials.header')
@include('partials.navbar')
<div class="container" style="margin-top: 50px;">
<table class="table">
<tr>
    <th>Customer Name</th>
    <th>Order</th>
    <th>Placed At</th>
    <th>Order Total</th>
    <th>Completed</th>
</tr>

@foreach($orders as $order)
@if (!$order->completed)
<tr>
    <td>{{$order->customer_name}}</td>
    <td>{{$order->order}}</td>
    <td>{{$order->created_at}}</td>
    <td>${{$order->price}}</td>
    <td><button class="btn btn-success">Completed</button></td>
</tr>
@endif
@endforeach
</table>
</div>
@include('partials.footer')
