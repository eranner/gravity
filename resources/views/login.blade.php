@include ('partials.header')
<h1 style='text-align:center;'>Login to your account</h1>
<form action="{{route('loginAction')}}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="password">Password</label>
    <input type="password" name="password">
    <input type="submit" value="Login">
</form>
@include ('partials.footer')
