@extends('layout.main_layout')

@section('page_tittle','Excel')

@section('tittle','Customer')

@section('content')

    <div class="card ">
    {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
        <!-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
        @elseif (session('error'))  
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
        @endif -->
        <div class="card-header">
            <h5>tabel customer</h5>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#importExcel">
                            Import data
            </button>
            <a type="button" class="btn btn-outline-primary " href="/excel/export">
                            export data
            </a>
        </div>
        <div class="card-body">
                            <table class='table table-striped ' id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Cust ID</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>Kode Pos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->id_customer}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->alamat}}</td>
                                        <td>{{$data->subdis_id}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
 
    </div>
<div class="modal fade text-left" id="imp" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import excel</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="form form-vertical" action="/excel/import" method="post">
                            @csrf
                            <div class="form-body">
                            
 
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">File</label>
                                            <div class="position-relative">
                                                <input type="file" id="file" name="file" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
                </div>
            </div>    
        </div>
</div>
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/excel/import" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
@endsection