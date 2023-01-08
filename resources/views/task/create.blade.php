
@extends('layouts.main')
@section('container')
    <div class="container">
      <div class="row my-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h2>CREATE TASK</h2>
            </div>
            <div class="card-body">
              <form action="/taskProject">
                <div class="mb-3">
                  <label for="taskname" class="form-label fw-bold">Nama barang</label>
                  <input type ="text" class="form-control" name="nama_barang" id="taskname">
                </div>
                <div class="mb-3">
                  <button class="btn btn-info" type="submit">CREATE</button>
                  <button type="button" id="button_add_schedule" class="btn btn-primary float-end">Add</button>
                </div>

                {{-- tesk --}}
                 <div id="list_schedule" class="border rounded p-3">
                  @if (old('schedules'))
                     @foreach (old('schedules') as $key => $schedule)
                        <div class="row" data-index-schedule="{{ $key }}">
                           <div class="col-5">
                              <div class="mb-3">
                                 <label for="input_schedule_name_{{ $key }}" class="form-label">Name</label>
                                 <input type="text" name="schedules[{{ $key }}][name]"
                                    value="{{ $schedule['name'] }}"
                                    class="form-control {{ $errors->has("schedules.{$key}.name") ? 'is-invalid' : null }}"
                                    id="input_schedule_name_{{ $key }}"
                                    aria-describedby="input_stall_schedule_name">
                                 <div class="invalid-feedback">
                                    {{ $errors->first("schedules.{$key}.name") }}
                                 </div>
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="mb-3">
                                 <label for="input_schedule_open_{{ $key }}" class="form-label">Open</label>
                                 <input type="time" name="schedules[{{ $key }}][open]"
                                    value="{{ $schedule['open'] }}"
                                    class="form-control {{ $errors->has("schedules.{$key}.open") ? 'is-invalid' : null }}"
                                    id="input_schedule_open_{{ $key }}"
                                    aria-describedby="input_stall_schedule_open">
                                 <div class="invalid-feedback">
                                    {{ $errors->first("schedules.{$key}.open") }}
                                 </div>
                              </div>
                           </div>
                           <div class="col-1 d-flex align-items-start justify-content-center">
                              <button type="button" data-type="btn-remove" data-index-schedule="{{ $key }}"
                                 class="btn btn-danger" style="margin-top: 2em">Remove</button>
                           </div>
                        </div>
                     @endforeach
                  @else
                     
                  @endif
               </div>
            </div>
            <div>
                {{-- end task --}}
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
            let indexSchedule = 0;
            $('#list_schedule').children().each(function() {
               let index = $(this).attr('data-index-schedule');
               if (index > indexSchedule) {
                  indexSchedule = index;
               }
            });
            indexSchedule = Number(indexSchedule) + 1;
            const newSchedule = `
              <div class="row" data-index-schedule="${indexSchedule}">
                     <div class="col-9">
                        <div class="mb-3">
                           <label for="input_schedule_name_${indexSchedule}" class="form-label">Name</label>
                           <input type="text" name="schedules[${indexSchedule}][name]" class="form-control" id="input_schedule_name_${indexSchedule}"
                              aria-describedby="input_stall_schedule_name">
                        </div>
                     </div>

                     <div class="col-3 d-flex align-items-start justify-content-center">
                        <button type="button" data-type="btn-remove" data-index-schedule="${indexSchedule}" class="btn btn-danger" style="margin-top: 2em">Remove</button>
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
   </script>
  
@endpush