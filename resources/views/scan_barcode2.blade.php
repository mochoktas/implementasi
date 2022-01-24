@extends('layout.main_layout')

@section('page_tittle','Barang')

@section('tittle','Scan Barcode')
@section('custom_css')
        <!-- <link href="{{ asset('assets/webcodecamjs/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/webcodecamjs/css/style.css') }}" rel="stylesheet"> -->
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Scan Barcode</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="container" id="QR-Code">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="navbar-form navbar-right">
                    <select class="form-control" id="camera-select"></select>
                    <div class="form-group">
                        <input id="image-url" type="text" class="form-control" placeholder="Image url">
                        <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="fas fa-upload"></span></button>
                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="far fa-image"></span></button>
                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="fas fa-play"></span></button>
                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="fas fa-pause"></span></button>
                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="fas fa-stop"></span></button>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="well" style="position: relative;display: inline-block;">
                        <canvas style="border: 1px solid grey;" width="320" height="240" id="webcodecam-canvas"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
                    <!-- <div class="well" style="width: 100%;">
                        <label id="zoom-value" width="100">Zoom: 2</label>
                        <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                        <label id="brightness-value" width="100">Brightness: 0</label>
                        <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                        <label id="contrast-value" width="100">Contrast: 0</label>
                        <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                        <label id="threshold-value" width="100">Threshold: 0</label>
                        <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                        <label id="sharpness-value" width="100">Sharpness: off</label>
                        <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                        <label id="grayscale-value" width="100">grayscale: off</label>
                        <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                        <br>
                        <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                        <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                        <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                        <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                    </div> -->
                </div>
                <div class="col-md-6">
                    <div class="thumbnail" id="result">
                        <div class="well" style="overflow: hidden;">
                            <img width="320" height="240" id="scanned-img" src="">
                        </div>
                        <div class="caption">
                            <h3>Scanned result</h3>
                            <p id="scanned-QR"></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  </div>
  <!-- /.card-body -->
  <!-- <div class="card-footer">
    Footer
  </div> -->
  <!-- /.card-footer-->
</div>
@endsection
@section('custom_js')
        <!-- <script type="text/javascript" src="{{ asset('assets/webcodecamjs/js/filereader.js') }}"></script>
       
        <script type="text/javascript" src="{{ asset('assets/webcodecamjs/js/qrcodelib.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/webcodecamjs/js/webcodecamjs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/webcodecamjs/js/main.js') }}"></script> -->

        <script type="text/javascript" src="{{ URL::asset('webcodecamjs/js/filereader.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('webcodecamjs/js/qrcodelib.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('webcodecamjs/js/webcodecamjs.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('webcodecamjs/js/main.js') }}"></script>

@endsection