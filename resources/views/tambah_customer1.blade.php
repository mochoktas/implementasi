@extends('layout.main_layout')

@section('page_tittle','Customer')

@section('tittle','Customer')

@section('content')

    <div class="card ">
        <div class="card-header">
            <h5>tambah data customer</h5>
        </div>
        <div class="card-content">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))  
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="form form-vertical" action="/tambah_customer_1/store" method="post">
                {{ csrf_field() }}
                <div class="form-body">
                  <div class="row">
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Nama</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Input Nama" id="Nama" name="nama" autocomplete="off">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        
                        <div class="form-group has-icon-left">
                            <label for="email-id-icon">Alamat</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Input Alamat" id="alamat" name="alamat" autocomplete="off">
                                <div class="form-control-icon">
                                    <i data-feather="map"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password-id-icon">Provinsi</label>
                            <select class="form-select" id="provinsi" name="provinsi">
                                <option selected>---Pilih Provinsi---</option>
                                @foreach ($provinsis as $data)
                                    <option value="{{$data->prov_id}}">{{$data->prov_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password-id-icon">Kota</label>
                            <select class="form-select" id="kota" name="kota">
                                <option>---Pilih Kota---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password-id-icon">Kecamatan</label>
                            <select class="form-select" id="kecamatan" name="kecamatan">
                                <option>---Pilih Kecamatan---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password-id-icon">Kelurahan</label>
                            <select class="form-select" id="kelurahan" name="kelurahan">
                                <option>---Pilih Kelurahan---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="results" style="border-style: solid; width:350px;height:250px;text-align:center;">Your captured image will appear here...</div>
                        <input type="hidden" name="image" class="image-tag">
                        <br>
                        <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#large">
                            Ambil Foto
                        </button>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                    
                  </div>
                </div>
                </form>
            </div>
        </div>
        
    </div>



<div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Camera on</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera" style="border-style: solid;width:360px;height:250px;"> camera on in here</div>
                                <center>
                                <br>
                                <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
                                </center>
                                <input type="hidden" name="image" class="image-tag">
                            <!-- <br/> -->
                        </div>
                        <div class="col-md-6">
                        <div id="resultSementara" style="border-style: solid; width:350px;height:250px;text-align:center;">Your captured image will appear here...</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button> 
                </div>
            </div>    
        </div>
</div>
@endsection
@section('custom_js')
<!-- <script src= "{{ asset('assets/jquery/jquery.js') }}" ></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<!-- <script src= "{{ asset('assets/jquery/wilayah.js') }}"> -->
<script>
$('#provinsi').change(function(){
    var provID = $(this).val();    
    if(provID){
        $.ajax({
           type:"GET",
           url:"/getKota?provID="+provID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kota").empty();
                $("#kecamatan").empty();
                $("#kelurahan").empty();
                $("#kota").append('<option>---Pilih Kota---</option>');
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota").empty();
               $("#kecamatan").empty();
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kota").empty();
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }      
});

$('#kota').change(function(){
    var kotaID = $(this).val();    
    if(kotaID){
        $.ajax({
           type:"GET",
           url:"/getKec?kotaID="+kotaID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kecamatan").empty();
                $("#kelurahan").empty();
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }      
});
 
$('#kecamatan').change(function(){
    var kecID = $(this).val();    
    if(kecID){
        $.ajax({
           type:"GET",
           url:"getKel?kecID="+kecID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kelurahan").empty();
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kelurahan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kelurahan").empty();
    }      
});

function hasGetUserMedia() {
  return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
}
if (hasGetUserMedia()) {
    

    Webcam.set({
            width: 350,
            height: 250,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
  
        Webcam.attach( '#my_camera' );
            function take_snapshot() {
                Webcam.snap( function(data_uri) {
  
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                    document.getElementById('resultSementara').innerHTML = '<img src="'+data_uri+'"/>';
                } );
            }  

} else {
  alert("getUserMedia() is not supported by your browser");
}

</script>
@endsection