@extends('layouts.main')
@section('container')
  <h2>VIEW PAGE CLIENT</h2>
  @if (session()->has('success'))
     <div class="alert">
        {{ session('success') }}
     </div>
  @endif
  <div class="row">
    <div class="col-md-10">
      <a href="client/create" class="btn btn-primary my-3">CREATE CLIENT</a>
      <table class="table shadow-sm" style="background-color:white">
        <tr class="fw-bold">
          <th>NO</th>
          <th>CLIENT NAME</th>
          <th>PHONE</th>
          <th>EMAIL</th>
          <th>ADDRESS</th>
          <th>ACTION</th>
        </tr>
        @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->client_name }}</td>
          <td>{{ $item->phone }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->address }}</td>
          <td>
            <a href="/client/{{ $item->id }}/edit" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
              <form action="client/{{ $item->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
              <button onclick="return confirm('yakin ingin menghapus data ini ? ')" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
          </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection