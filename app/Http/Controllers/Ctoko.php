<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use PDF;
class Ctoko extends Controller
{
    //
    public function index(){
        $toko = Toko::all();
        return view('toko_index',compact('toko'));
    }
    public function store(Request $request){
        $request->validate([
            'nama_toko' => 'max:50',
        ]);
        $toko = Toko::create([
            'nama_toko' => $request->nama_toko,
            'latitude' => $request->latitudes,
            'longitude' => $request->longitudes,
            'accuracy' => $request->accuracy
            

        ]);
        
        if($toko){
            //redirect dengan pesan sukses
            return redirect('/toko')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/toko')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function scan_toko(){
        return view('scan_toko');
    }
    public function getLocationToko(Request $request){
        $data['location'] = Toko::where("barcode",$request->idtoko)->get(["latitude", "longitude","accuracy"]);
        //dd($data);
        return response()->json($data);
    }

    public function getDistanceFromLatLonInKm(Request $request) {
        //dd($request->barcode);
        $toko = DB::table('lokasi_toko')->where('barcode',$request->barcode)->get();
        //$toko = lokasi_toko::where('barcode',$request->barcode);
        //dd($toko);
        foreach($toko as $value){
            $lat = $value->latitude;
            $long = $value->longitude;
            $acc = $value->accuracy;
        }
        //dd($lat,$long,$acc);
        $earthRadius = 6371000; // Radius of the earth in meter
        //dd($dlat,$dlon);
        $lat_a = $request->latitude;
         $lon_a = $request->longitude;
         $lat_b = $lat;
         $lon_b = $long;
//dd($lat_a,$lon_a,$lat_b,$lat_b);
         $latFrom = deg2rad($lat_a);
         $lonFrom = deg2rad($lon_a);
         $latTo = deg2rad($lat_b);
         $lonTo = deg2rad($lon_b);
        //dd($latFrom,$lonFrom,$latTo,$lonTo);
         $latDelta = $latTo - $latFrom;
         $lonDelta = $lonTo - $lonFrom;
            //dd($latDelta,$lonDelta);
         $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
           cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
           //dd($angle);
         $betwenPoin = $angle * $earthRadius;
         dd($betwenPoin);
      
    }
    public function export($id)
    {
        $pdf = PDF::loadView('cetak-toko', compact('id'));
    
       return $pdf->download('barcode-Toko-'.$id.'.pdf');
    }
}
