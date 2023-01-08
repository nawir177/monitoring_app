@extends('layouts.main')
@section('container')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h2>EDIT LEADER</h2>
          </div>
          <div class="card-body">
            <form action="/leader/{{ $data->id }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="mt-3">
                <label for="project-name" class="form-label">Name Leader</label>
                <input type ="text" class="form-control" name="nama" id="project-name" value="{{ $data->nama }}">
                @error('nama')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="project-name" class="form-label">Email</label>
                <input type ="text" class="form-control" name="email" id="email" value="{{ $data->email }}">
                @error('email')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <input type="hidden" value="{{ $data->img }}" name="gambarLama">
              <div class="mb-3">
                <label for="formFile" class="form-label">IMAGE</label>
                <input class="form-control" type="file" id="gambar" name="img" onchange="previewImage()">
              </div>
                <div class="col-md-5">
                    <img class="img-preview img-fluid my-3">
                </div>
                <div class="col-md-5">
                    <img class="img-old img-fluid my-3" src="{{ asset('storage/'. $data->img) }}">
                </div>
              <input type="hidden" name="progress" value="0">
              <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
            </form>

          </div>
        </div>
      </div>
    </div>
</div>
@endsection
<script>

</script>