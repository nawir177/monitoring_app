@extends('layouts.main')
@section('container')
   <div class="row mt-4">
      <div class="col-md-8">
         <div class="card shadow">
            <div class="card-header">
               <h3>CREATE CLIENT</h3>
            </div>
            <div class="card-body">
             @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                  </ul>
               </div>
            @endif
               <form action="/client" method="post">
                  @csrf
                  <div class="mb-3">
                     <label for="name" class="form-label fw-bold">CLINET NAME</label>
                     <input type ="text" name="client_name" id="name" class="form-control" placeholder="INPUT NAME" autocomplete="off">
                  </div>
                  <div class="mb-3">
                     <label for="phone" class="form-label fw-bold">PHONE</label>
                     <input type ="text" name="phone" id="phone" class="form-control" placeholder="INPUT PHONE" autocomplete="off">
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label fw-bold">EMAIL</label>
                     <input type ="text" name="email" id="email" class="form-control" placeholder="INPUT EMAIL" autocomplete="off">
                  </div>
                  <div class="mb-3">
                     <label for="address" class="form-label fw-bold">ADDRESS</label>
                     <input type ="text" name="address" id="address" class="form-control" placeholder="ADDRESS" autocomplete="off">
                  </div>
                  <button class="btn btn-success my-3" type="submit">CREATE</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection