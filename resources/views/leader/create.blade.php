@extends('layouts.main')
@section('container')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header">
            <h2>Create Leader</h2>
          </div>
          <div class="card-body">
            <form action="/leader" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mt-3">
                <label for="project-name" class="form-label">Leader Name</label>
                <input type ="text" class="form-control" name="nama" id="project-name">
                @error('nama')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="project-name" class="form-label">Email</label>
                <input type ="text" class="form-control" name="email" id="project-name">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="my-3">
                <label for="formFile" class="form-label">IMAGE</label>
                <input class="form-control" type="file" id="gambar" name="img" onchange="previewImage()">
                 <div class="col-md-5">
                      <img class="img-preview img-fluid my-3">
                  </div>
              </div>
              <input type="hidden" name="progress" value="0">
              <button class="btn btn-warning mt-3" type="submit">CREATE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection