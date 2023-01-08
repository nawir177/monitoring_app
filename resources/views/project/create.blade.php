@extends('layouts.main')
@section('container')
<div class="container mt-4">
  
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h2>Create Project</h2>
          </div>
          <div class="card-body">
            <form action="/project" method="post">
              @csrf
              <div class="mt-3">
                <label for="project-name" class="form-label">Project Name</label>
                <input type ="text" class="form-control" name="project-name" id="project-name">
                @error('project-name')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <select class="form-select mt-3" aria-label="Default select example" name="leader_id">
                <option selected disabled>Select To Leader</option>>
                @foreach ($data as $item)
                  <option value="{{ $item->id }}">{{ $item->nama}}</option>
                @endforeach
              </select>
               @error('leader_id')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              <div class="mb-3">
                <select class="form-select mt-3" aria-label="Default select example" name="client_id">
                <option selected disabled>Select To Client</option>>
                @foreach ($client as $item)
                  <option value="{{ $item->id }}">{{ $item->client_name}}</option>
                @endforeach
              </select>
              </div>
              <div class="mt-3">
                <label for="start-date" class="form-label">Start Date</label>
                <input type ="date" class="form-control" name="start-date" id="start-date">
                 @error('start-date')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="end-date" class="form-label">End Date</label>
                <input type ="date" class="form-control" name="end-date" id="start-date">
              </div>
               @error('end-date')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              <input type="hidden" name="progres" value="0">
              <button class="btn btn-warning mt-3" type="submit">CREATE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection