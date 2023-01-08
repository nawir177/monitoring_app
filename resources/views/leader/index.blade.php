@extends('layouts.main')
@section('container')
    <h1>Halaman Leaader</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          @if(session()->has('sukses'))
            <div class="col-9 alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('sukses') }}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if(session()->has('gagal'))
            <div class="col-9 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('gagal') }}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            @endif
          <div class="card bg-light">
            <div class="card-body">
              <a href="/leader/create" class="btn btn-primary my-3">CREATE LEADER</a>
              <table class="table">
                <tr>
                  <th>NO</th>
                  <th>LEADER NAME</th>
                  <th>EMAIL</th>
                  <th>IMG</th>
                  <th>ACITON</th>
                </tr>
                @foreach ($data as $leader)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $leader->nama }}</td>
                    <td>{{ $leader->email }}</td>
                    <td>
                      <img src="{{ $leader->img }}" class="img-thumbnail" width="150px" alt="">
                    </td>
                    <td>
                            <form action="leader/{{ $leader->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="oldImage" value="{{ $leader->img }}">
                            <button onclick="return confirm('yakin ingin menghapus data ini ? ')" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                            <a href="/leader/{{$leader->id}}/edit" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection