@extends('layouts.main')
@section('container')
    <div class="container my-3">
@if(session()->has('sukses'))
        <div class="col-7 alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('sukses') }}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('gagal'))
        <div class="col-7 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('gagal') }}</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- view progress --}}


    {{-- end view progress --}}
        <a href="/project/create" class="btn btn-primary my-3">CREATE PROJECT</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        TASK PROJECT
        </button>   
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-condensed">
                    <tr>
                        <th>PROJECT NAME</th>
                        <th>PROGRES</th>
                        <th>ACTION</th>
                    </tr>
                    @foreach ($data as $item)
                    <tr>
                        <td >{{ $item['project-name'] }}</td>
                        <td class="fw-bold fs-10">{{ $item->progres }}%</td>
                        <td>
                            <a href="/project/{{ $item->id }}" class="btn btn-info btn-danger">DETAIS</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        {{-- end modal --}}
    @isset($data->leader)
        <p>tidak ada data</p>
    @endisset
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table .table-borderless">
                        <tr>
                            <th>Project Name</th>
                            <th>CLIENT</th>
                            <th>PROJECT LEADER</th>
                            <th>START DATE</th>
                            <th>END DATE</th>
                            <th>PROGRESS</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item['project-name'] }}</td>
                            <td>{{ $item->client->client_name }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <img class="rounded-circle" height="50px" width="50px" src="{{ $item->leader->img }}" alt="">
                                    </div>
                                    <div class="col">
                                        {{ $item->leader->nama }}
                                        <p class="fw-light">{{ $item->leader->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item['start-date'] }}</td>
                            <td>{{ $item['end-date'] }}</td>
                            <td>
                                <div class="progress" style="height:6px">
                                    <div class="progress-bar progress-primary {{ $item->progres==100 ?"bg-success" :"" }}" role="progressbar" aria-label="Basic example" style="width:{{ $item->progres }}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="40"></div>
                                </div>{{ $item->progres }}%
                            </td>
                            <td>
                                <form action="/project/{{ $item->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('yakin ingin menghapus data ini ? ')" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                <a href="/project/{{ $item->id }}/edit" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/project/{{ $item->id }}" class="btn btn-info btn-sm"><i class="bi bi-window"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection