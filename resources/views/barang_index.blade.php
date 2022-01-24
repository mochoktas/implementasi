@extends('layout.main_layout')

@section('page_tittle','Barang')

@section('tittle','Barang')

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
            <h5>tabel barang</h5>
        </div>
        <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#inp">
                            input data
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#pdf">
                            cetak pdf semua
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                            data-bs-target="#chk">
                            cetak pdf pilihan
            </button>
        </div>
        </div>
        <div class="card-body">
                            <table class='table table-striped ' id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Barang</th>
                                        <th>Nama</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($barang as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->id_barang}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td style="text-align:center">
                                            <?php
                                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128)) . '">';                                    
                                                /*
                                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                echo $generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128);
                                                */
                                            ?>
                                            <br>
                                            <?= $data->id_barang?>
                                            <br>
                                            <?= $data->nama?>
                                        </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Barang</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="form form-vertical" action="/barang/store" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input Nama Barang" id="Nama" name="nama_barang" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i data-feather="package"></i>
                                                    </div>
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
<div class="modal fade text-left" id="pdf" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Start Cetak PDF</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="form form-vertical" action="/barang/cetakPdf" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Baris</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input Baris Barang" id="Nama" name="baris_barang" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i data-feather="columns"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Kolom</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Input Kolom Barang" id="Nama" name="kolom_barang" autocomplete="off">
                                                    <div class="form-control-icon">
                                                        <i data-feather="columns"></i>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Cetak</button>
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
<div class="modal fade text-left" id="chk" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Start Cetak PDF</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- <form class="form form-vertical" action="/barang/cetakPdf" method="post">
                            @csrf -->
                            <!-- <div class="form-body"> -->
                                <div class="row">
                                    
                                    <table class='table table-striped ' id="table1">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>ID Barang</th>
                                                <th>Nama</th>
                                                <th><input type="checkbox" class="checkAll" name="checkAll" /></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @forelse($barang as $data)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$data->id_barang}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td><input type="checkbox" name="check" value="{{$data->id_barang}}" /></td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Barang belum Tersedia.
                                            </div>


                                        @endforelse
                                        
                                        </tbody>
                                    </table>
                              </div>
                            <!-- </div> -->
                        <!-- </form> -->
                        
                                
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-3">
                    <button type="submit" class="btn btn-primary" id="btnGet">Cetak</button>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
                </div>
            </div>    
        </div>
</div>
@endsection
@section('custom_js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
  $('.checkAll').on('click', function () {
    $(this).closest('table').find('tbody :checkbox')
      .prop('checked', this.checked)
      .closest('tr').toggleClass('selected', this.checked);
  });

  $('tbody :checkbox').on('click', function () {
    $(this).closest('tr').toggleClass('selected', this.checked); //Classe de seleção na row
  
    $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); //Tira / coloca a seleção no .checkAll
  });
});
</script>
<script type="text/javascript">
    $(function () {
        //Assign Click event to Button.
        $("#btnGet").click(function () {
            
            var allVals = [];
  
  
        //I get my values from checkboxes checked in a div with id interests  
  
        $('tbody :checkbox:checked').each(function(){
       
           allVals.push($(this).val());

        });

  
        //Now I am making an post ajax call
        parameter= "/"+ allVals.join()
        url= "{{url('/barang/cetakPdfChk')}}";
        document.location.href=url+parameter;
        });
    });
</script>

@endsection
