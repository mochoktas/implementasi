<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use PDF;
class Cbarang extends Controller
{
    //
    public function index(){
        $barang = Barang::all();
        return view('barang_index',compact('barang'));
    }
    public function store(Request $request){
        $request->validate([
           
            'nama_barang' => 'max:50',
        ]);
        $barang = Barang::create([
            'nama' => $request->nama_barang
        ]);
        
        if($barang){
            //redirect dengan pesan sukses
            return redirect('/barang')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/barang')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function cetakPdf(Request $request){
        //dd($barang);
        $data = Barang::all();
        $baris = $request->baris_barang;
        $kolom = $request->kolom_barang;
        $long = count($data);
        $long =intval($long/5);
        $long++;
        //dd($baris,$kolom);
        $pdf = PDF::loadView('barcodePDF', compact('data','long','baris','kolom'));
    
        return $pdf->download('barangBarcode.pdf');
        
        // return view('barcodePDF',compact('data','long','baris','kolom'));
    }
    public function scan_barcode(){
        return view('scan_barcode');
    }
    public function cetakPdfChk(Request $request){
        //dd($barang);
        // $iarray=Input::get('checkbox');
        $dataa = $request->id_barang;
        $datab = explode(",", $dataa);
        // $data = DB::table('Barang')->where('id_barang',$datab)->get();
        $data = Barang::whereIn('id_barang', $datab)->get();
        $baris = 0;
        $kolom = 0;
        $long = count($data);
        $long =intval($long/5);
        $long++;
        //dd($baris,$kolom);
        $pdf = PDF::loadView('barcodePDF', compact('data','long','baris','kolom'));
    
        return $pdf->download('barangBarcode.pdf');
        
        // return view('barcodePDF',compact('data','long','baris','kolom'));
    }
}
