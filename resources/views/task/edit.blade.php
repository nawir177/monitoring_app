@extends('layouts.main')
@section('container')
<div class="container mb-4">
  <div class="col-md-8 my-4">
    <form action="/task_update/{{$data->id}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="taskname" class="form-label">TASK NAME</label>
        <input type ="text" class="form-control shadow" name="taskname" id="taskname" value="{{ $data->task_name }}">
        <input type="hidden" name="id" value="{{ $data->id }}">
      </div>
      <button class="btn btn-success" type="submit">UPDATE</button>
    </form>
  </div>
</div>
@endsection