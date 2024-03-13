@include ('partials.header')
@include ('partials.navbar')
<h2 style='text-align:center;' class="login-header">Login to Employee Portal</h2>
<form action="{{route('loginAction')}}" method="POST" style="max-width: 300px; margin:auto;">
    @csrf
    <label for="email" class="form-label readable">Email</label>
    <input type="email" name="email" class="form-control form-control-sm mb-2">
    <label for="password" class="form-label readable">Password</label>
    <input type="password" name="password" class="form-control form-control-sm">
    <input type="submit" value="Login" class="btn btn-primary mt-3" style="margin:auto;">
</form>
<div class="container mt-4" style="max-width: 400px;">
    <div class="accordion" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="font-weight:bold; text-align:center;">
              Expand for Demo Login Credentials
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul>
                    <li style="list-style-type: none;"><span style="font-weight:bold;">Email:</span> testadmin@icecreamshop.site</li>
                    <li style="list-style-type: none;"><span style="font-weight:bold;">Password:</span> secret123</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
</div>

@include ('partials.footer')
