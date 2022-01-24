<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Support\Facades\Storage;
use App\Imports\CustomerImport;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Session;

class Ccustomer extends Controller
{
    //
    public function index(){

        $customer = Customer::all();
        
        return view('customer',compact('customer'));
    }
    public function tambah_customer_1(){
        $provinsis = Provinsi::all();
        return view('tambah_customer1',compact('provinsis'));
    }
    public function getKota(Request $request){
        $kota = Kota::where("prov_id",$request->provID)->pluck('city_id','city_name');
        return response()->json($kota);
    }
    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("city_id",$request->kotaID)->pluck('dis_id','dis_name');
        return response()->json($kecamatan);
    }
    public function getKelurahan(Request $request){
        $kelurahan = Kelurahan::where("dis_id",$request->kecID)->pluck('subdis_id','subdis_name');
        return response()->json($kelurahan);
    }
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama'   => 'required',
        ]);

        // $image = $request->image;  // your base64 encoded

        $image = Str::replace('data:image/jpeg;base64,', '', $request->image);
        $image = Str::replace(' ', ' + ', $image);
        $imageName = Str::random(10) . '.jpeg';

        // $image = str_replace('data:image/png;base64,', '', $request->image);
        // $image = str_replace(' ', ' + ', $image);
        // $imageName = str_random(10) . '.png';

        Storage::disk('local')->put($imageName, base64_decode($image));
        
        $customers = Customer::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'foto'     => $request->image,
            'file_path' => $imageName,
            'subdis_id' =>   $request->kelurahan
        ]);

        
        if($customers){
            //redirect dengan pesan sukses
            return redirect('/tambah_customer_1')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/tambah_customer_1')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function excels(){

        $customer = Customer::all();
        
        return view('customer_excel',compact('customer'));
    }

    public function import_excel(Request $request) 
    {
	    // validasi
	    $this->validate($request, [
		    'file' => 'required|mimes:csv,xls,xlsx'
	    ]);
 
	    // menangkap file excel
	    $file = $request->file('file');
 
	    // membuat nama file unik
	    $nama_file = rand().$file->getClientOriginalName();
 
	    // upload ke folder file_customer di dalam folder public
	    $file->move('file_customer',$nama_file);
 
	    // import data
	    Excel::import(new CustomerImport, public_path('/file_customer/'.$nama_file));
 
	    // notifikasi dengan session
	    Session::flash('sukses','Data Customer Berhasil Diimport!');
 
	    // alihkan halaman kembali
	    return redirect('/excel');
        // return redirect('/excel')->with(['success' => 'Data Customer Berhasil Diimport!']);
    }
    public function export_excel()
	{
		return Excel::download(new CustomerExport, 'cus.xlsx');
	}
}
