@extends('layout.main_layout')

@section('page_tittle','Customer')

@section('tittle','Customer')

@section('content')

    <div class="card ">
        <div class="card-header">
            <h5>tabel customer</h5>
        </div>
        <div class="card-body">
                            <table class='table table-striped ' id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Cust ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                        <th>File Path</th>
                                        <th>Kelurahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->id_customer}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->alamat}}</td>
                                        <td><img width="150px" src="{{$data->foto}}"></td>
                                        <!-- <td><img width="150px" src="{{ url('/storage/'.$data->file_path) }}"></td> -->
                                        <td><img width="150px" src="{{ asset('/storage/'.$data->file_path) }}"></td>
                                        <td>{{$data->kelurahan->subdis_name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
 
    </div>
@endsection