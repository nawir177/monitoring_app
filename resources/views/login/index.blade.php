@extends('layouts.user')
@section('container')
{{-- <section class="vh-100 gradient-custom">
   <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-12 col-md-8 col-lg-6 col-xl-5">
         <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

               <div class="mb-md-5 mt-md-4 pb-5">

               <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
               <p class="text-white-50 mb-5">Please enter your login and password!</p>

               <div class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Email</label>
               </div>

               <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Password</label>
               </div>

               <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

               <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

               <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
               </div>

               </div>

               <div>
               <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
               </p>
               </div>

            </div>
         </div>
         </div>
      </div>
   </div>
</section> --}}
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Wellcome To Website <br />
          <span style="color: hsl(218, 81%, 75%)">DIGITALIZ</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5" style="height: 500px">
            <form action="/login" method="post">
               @csrf  
               <h1 class="text-center">LOGIN</h1>         <!-- 2 column grid layout with text inputs for the first and last names -->
               <div class="row">
               <div class="form-outline mb-4">
                  <input type="email" id="login" class="form-control" name="email" value="{{ old('email'); }}"/>
                  <label class="form-label" for="login" >Email address</label>
               </div>

               <!-- Password input -->
               <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" name="password"/>
                  <label class="form-label" for="form3Example4">Password</label>
                  <br>
                  <label class="" for="form2Example33">
                     show Password
                  </label>
                  <input class="form-check-input me-2" type="checkbox" value="" id="cek" onchange="myFunction()" />
               </div>
               {{-- alert --}}
               @if (session()->has('LoginError'))
                  <p class="text-danger">{{ session('LoginError') }}</p>
               @endif
               {{-- end alert --}}
               <!-- Submit button -->
               <button type="submit" class="btn btn-primary btn-block mb-4">
                  Sign up
               </button>
            </form>
            <a  href="/register" class="text-center text-decoration-none">Register</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
<!-- Section: Design Block -->
@endsection