@extends('layout.main_layout')

@section('page_tittle','Toko')

@section('tittle','Toko')

@section('content')

    <div class="card ">
        @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
        @elseif (session('error'))  
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
        @endif
        <div class="card-header">
            <h5>tabel Toko</h5>
        </div>
        <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#inp">
                            input data
            </button>
            <!-- <button class="button btn btn-danger" id="play" onclick="play()">Reset</button> -->
        </div>
        
        </div>
                        <div class="card-body">
                            <table class='table table-striped ' id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>barcode</th>
                                        <th>Nama</th>
                                        <th>latitude</th>
                                        <th>longitude</th>
                                        <th>accuracy</th>
                                        <th>barcode</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($toko as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->barcode}}</td>
                                        <td>{{$data->nama_toko}}</td>
                                        <td>{{$data->latitude}}</td>
                                        <td>{{$data->longitude}}</td>
                                        <td>{{$data->accuracy}}</td>
                                        <td style="text-align:center">
                                            <?php
                                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode, $generator::TYPE_CODE_128)) . '">';                                    
                                                /*
                                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                echo $generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128);
                                                */
                                            ?>
                                            <br>
                                            <?= $data->barcode?>
                                            <br>
                                            <?= $data->nama_toko?>
                                        </td>
                                        <td><a class="btn btn-outline-success" href="{{url('toko/export/'. $data->barcode)}}">EXPORT PDF</a></td>
                                    </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Barang belum Tersedia.
                                        </div>


                                    @endforelse
                                </tbody>
                            </table>
                        </div>
 
    </div>
<div class="modal fade text-left" id="inp" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Toko</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="form form-vertical" action="/toko/store" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input Nama Toko" id="Nama" name="nama_toko" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i data-feather="home"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Latitude</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input latitude" autocomplete="off" id="latitudes" name="latitudes">
                                                    <div class="form-control-icon">
                                                        <i data-feather="map-pin"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Longitude</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input longitude" autocomplete="off" id="longitudes" name="longitudes" >
                                                    <div class="form-control-icon">
                                                        <i data-feather="map"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Accuracy</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input accuracy" autocomplete="off"  id="accuracy" name="accuracy" >
                                                    <div class="form-control-icon">
                                                        <i data-feather="map-pin"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3" >
                                        <a class="btn btn-primary me-1 mb-1" onclick="getLocation()">Generate Location</a>
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

@endsection

@section ('custom_js'){
    <script src= "{{ asset('assets/jquery/jquery.js') }}" ></script>
    
    <script>
        
        var x = document.getElementById("latitudes");
var y = document.getElementById("longitudes");
// var latitude_user;
// var longitude_user;
// var accuracy_user;
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.value = "Geolocation is not supported by this browser.";
    y.value = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
  // latitude_user = position.coords.latitude;
  // longitude_user = position.coords.longitude;
}
    </script>

<!-- <script>
    function play() {
        
    
        var audio = new Audio('https://www.youtube.com/watch?v=NtgXxZcEA90');
        audio.play();
    }
</script> -->

@endsection