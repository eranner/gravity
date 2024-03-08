@include('partials.header')
@include('partials.navbar')
<div class="container">
    <div class="thank-you-message">
        <h2>Thank you for your order!</h2>
        <p>Most orders are filled within 15 minutes. Please go to the "Mobile Pickup" window to get your order.</p>
        <p>Thanks for being a valued customer!</p>
        <p style='color:white; font-size: .8rem; text-shadow: .5px .5px #333;'>You will now be redirected back to our main page...</p>
    </div>

</div>
<script>
    setTimeout(() => {
        location.replace("{{route('main')}}")
    }, 2000);
</script>
@include('partials.footer')
