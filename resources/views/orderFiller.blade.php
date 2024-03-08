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
@if (!$order->complete)
<tr>
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
@include('partials.footer')
</form>
