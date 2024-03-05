@include ('partials.header')
@include ('partials.navbar')
<h2 style='text-align:center;' class="login-header">Login to your account</h2>
<form action="{{route('loginAction')}}" method="POST" style="max-width: 300px; margin:auto;">
    @csrf
    <label for="email" class="form-label readable">Email</label>
    <input type="email" name="email" class="form-control form-control-sm mb-2">
    <label for="password" class="form-label readable">Password</label>
    <input type="password" name="password" class="form-control form-control-sm">
    <input type="submit" value="Login" class="btn btn-primary mt-3" style="margin:auto;">
</form>
@include ('partials.footer')
