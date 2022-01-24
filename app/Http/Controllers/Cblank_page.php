<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Cblank_page extends Controller
{
    //
    public function index(){
        
        // $url = 'https://apicybercampus.unair.ac.id/api/tele/coba2';

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 300);

        // $server_output = curl_exec($ch);
        // curl_close($ch);

        // $arrVal = json_decode($server_output, true);

        // dd($arrVal);
        return view('blank_page');

    }
}
