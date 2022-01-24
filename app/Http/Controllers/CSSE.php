<?php

namespace App\Http\Controllers;
// use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Antrian;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CSSE extends Controller
{
    //

    public function console(){
        $antri = DB::table('antrian')->get();
        return view('console',compact('antri'));

    }
    public function sseview(){
        
        return view('sseview');
    }
    public function sse(){
        // $ant = DB::table('antrian')->get();
        // header('Content-Type: text/event-stream');
        // header('Cache-Control: no-cache');
        // $array = array(
        //   'nomor_antrian' => $ant[0]->nomor_antrian,
        //   'loket' => $ant[0]->loket, 
        // );
        // //$time = date('r');
        // echo "data:".json_encode($array).PHP_EOL;
        // echo "retry: 1000".PHP_EOL;
        // echo PHP_EOL;
        // ob_end_flush();
        // flush();
        //--------
        $response = new StreamedResponse();
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->setCallback(
            function() {
                    $score = DB::table('antrian')->where('antrian_id', '1')->get();
                    echo "data: ".json_encode($score)."\n\n";
                    echo "retry: 1000\n\n"; // no retry would default to 3 seconds.
                    ob_end_flush();
                    // ob_flush();
                    flush();
            });
        $response->send();
    }
    public function updateAntrian(Request $request){
        // $antrian = Antrian::find(1);
        // $antrian->nomor_antrian = $request->an;
        // $antrian->loket = $request->lk;
        // $antrian->save();
        // DB::table('antrian')->where('antrian_id','1')->update([
        //     'nomor_antrian'=> $request->an
        // ]);
        // $data["antrian"] = DB::table('antrian')->get();
       
        // return response()->json();
        // return json_encode(array('statusCode'=>200));
        // return response()->json(
        //     [
        //       'success' => true,
        //       'message' => 'Data inserted successfully'
        //     ]);
        // -------------------------
        $score = DB::table('antrian')->where('antrian_id', '1')->get();
        foreach($score as $sc){
            $result = $sc->nomor_antrian;
        }
            $result_fix = $result+1;
        DB::table('antrian')->where('antrian_id','1')->update([
            'nomor_antrian' =>  $result_fix
        ]);
        $data["ant"] = DB::table('antrian')->get();
        //dd($data);
        return response()->json($data);
        
    //    return response()->json(
    //     [
    //       'success' => true,
    //       'message' => 'Data inserted successfully'
    //     ]);
    }

    public function resetAntrian(Request $request){
        DB::table('antrian')->where('antrian_id','1')->update([
            'nomor_antrian' =>  0
        ]);
        $data["ant"] = DB::table('antrian')->get();
        return response()->json($data);
    }
    
}
