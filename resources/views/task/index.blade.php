@extends('layouts.main')
@section('container')
{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">CREATE TASK PROJECT</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
        <div class="row my-4">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h2>CREATE TASK</h2>
              </div>
              <div class="card-body">
                <form action="/task_project" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="taskname" class="form-label fw-bold">TASK NAME</label>
                    <input type ="text" class="form-control" name="task[]" id="taskname" required>
                    <input type="hidden" value="{{ $data->id }}" name="project_id">
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary" type="submit">CREATE</button>
                    <button type="button" id="button_add_schedule" class="btn btn-sm btn-success float-end"><i class="bi bi-plus-circle"></i></button>
                  </div>
                  <div id="list_schedule" class="p-3"></div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
{{-- end modal --}}
<div class="container m-3">
  <h2>{{ $data['project-name'] }}</h2>
@if(session()->has('sukses'))
  <div class="col-7 alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{!! session('sukses') !!}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('gagal'))
  <div class="col-7 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ session('gagal') }}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row mt-4">
<div class="col-md-8">
<!-- Modal -->


<form action="/task_project/{{ $data->id }}" method="post">
  @method('PATCH')
  @csrf
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  CREATE NEW TASK
</button>
  <button class="btn btn-success my-3" type="submit"  onclick='swal("successfully updated!", "successfully updated task data", "success");'>UPDATE</button>
  <div class="my-3">
      <div class="progress my-2" style="height:10px">
      <div class="progress-bar progress-primary {{ $data->progres==100 ?"bg-success" :"" }}" role="progressbar" aria-label="Basic example" style="width:{{ $data->progres }}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="40"></div>
    </div><div class="fw-bold fs-4">{{ $data->progres }}% </div>  
  </div> 

  <div class="card">
        <div class="card-header text-center text-light bg-secondary">
          <h2>PROGRES PROJECT</h2>
        </div>
        <div class="card-body">
          <table class="table table-condensed">
            <tr>
                <th>NAME</th>
                <th>TASK NAME</th>
                <th>ACTION</th>
              </tr>
              @foreach ($data->taskProject as $item)
              <tr>
                  <td>{{$item['task_name'] }}</td>
                  <td>
                    <div class="form-check my-2">
                        <input class="form-check-input" name="task[]" type="checkbox" {{ $item->value==true?"checked" :"" }} value="{{ $item->id }}" id="flexCheckDefault">
                      </div>
                  </td>
                  <td>
                    <a href="/task_project/{{ $item->id }}/edit" class="btn btn-primary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="/task_project/delete/{{ $item->id }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                  </td>
              </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </form>
          </div>
        </div>
</div>
</div>
</div>

@endsection

@push('javascript-internal')
  <script type="text/javascript">
      $(document).ready(function() {
        $('#button_add_schedule').on('click', function(e) {
            e.preventDefault();
            let indexSchedule = 1;
            $('#list_schedule').children().each(function() {
              let index = $(this).attr('data-index-schedule');
              if (index > indexSchedule) {
                  indexSchedule = index;
              }
            });
            indexSchedule = Number(indexSchedule) + 1;
            const newSchedule = `
              <div class="row" data-index-schedule="${indexSchedule}">
                    <div class="col-10">
                        <div class="mb-3">
                          <label for="input_schedule_name_${indexSchedule}" class="form-label">TASK NAME</label>
                          <input type="text" name="task[${indexSchedule}]" class="form-control" required id="input_schedule_name_${indexSchedule}"
                              aria-describedby="input_stall_schedule_name">
                        </div>
                    </div>
                    <div class="col-2 d-flex align-items-start justify-content-center">
                        <button type="button" data-type="btn-remove" data-index-schedule="${indexSchedule}" class="btn btn-danger btn-sm" style="margin-top: 2em">Remove</button>
                    </div>
                  </div>
              `;
            $('#list_schedule').append(newSchedule);
        });
         //  Event button remove
        $(document).on('click', "button[data-type='btn-remove']", function(e) {
            e.preventDefault();
            let indexSchedule = $(this).attr('data-index-schedule');
            if ($('#list_schedule').children().length !== 0) {
            $(`div[data-index-schedule="${indexSchedule}"]`).remove();
            }
        });
      });


      function confirm_(){
        return swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
      }
  </script>
@endpush

