@extends('layouts.main')
@section('container')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h2>EDIT Project</h2>
          </div>
          <div class="card-body">
            <form action="/project/{{ $data->id }}" method="post">
              @method('patch')
              @csrf
              <div class="mt-3">
                <label for="project-name" class="form-label">Project Name</label>
                <input type ="text" value="{{ $data['project-name'] }}" class="form-control" name="project-name" id="project-name">
                @error('project name')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="Leader" class="form-label">Leader</label>
                <select class="form-select" aria-label="Default select example" name="leader_id">
                  <option disabled>Select To Leader</option>>
                  @foreach ($leader as $item)
                    <option {{ $data->leader_id==$item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nama}}</option>
                  @endforeach
                </select>
              </div>
               @error('leader_id')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              <div class="mt-3">
                <label for="Leader" class="form-label">Client</label>
                <select class="form-select" aria-label="Default select example" name="client_id">
                  <option disabled>Select To Client</option>>
                  @foreach ($client as $item)
                    <option {{ $data->client_id==$item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->client_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mt-3">
                <label for="start-date" class="form-label">Start Date</label>
                <input type ="date" class="form-control" name="start-date" id="start-date" value="{{ $data['start-date'] }}">
                 @error('start-date')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="end-date" class="form-label">End Date</label>
                <input type ="date" class="form-control" name="end-date" id="start-date" value="{{ $data['end-date'] }}">
              </div>
               @error('end-date')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                @enderror
              <input type="hidden" name="id" value="{{ $data->id }}">
               <input type="hidden" name="progres" value="{{ $data->progres }}">
              <button class="btn btn-info mt-3" type="submit">UPDATE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection