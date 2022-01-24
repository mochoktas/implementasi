<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Cblank_page;
// Route::get('/my_blankpage', [Cblank_page::class,'blank_page'])->name('products.blank_page');
Route::get('/blank', [Cblank_page::class,'index']);
// Route::get('/my_blankpage', 'app\Http\Controllers\Cblank_page@blank_page');

use App\Http\Controllers\Ccustomer;
Route::get('/customer', [Ccustomer::class,'index']);
Route::get('/tambah_customer_1', [Ccustomer::class,'tambah_customer_1']);
Route::get('/getKota',[Ccustomer::class,'getKota']);
Route::get('/getKec',[Ccustomer::class,'getKecamatan']);
Route::get('/getKel',[Ccustomer::class,'getKelurahan']);
Route::post('/tambah_customer_1/store', [Ccustomer::class,'store']);
Route::get('/excel', [Ccustomer::class,'excels']);
Route::post('/excel/import', [Ccustomer::class,'import_excel']);
Route::get('/excel/export', [Ccustomer::class,'export_excel']);

use App\Http\Controllers\Cbarang;
Route::get('/barang', [Cbarang::class,'index']);
Route::post('/barang/store', [Cbarang::class,'store']);
Route::post('/barang/cetakPdf', [Cbarang::class,'cetakPdf']);
Route::get('/scan_barcode', [Cbarang::class,'scan_barcode']);
Route::get('/barang/cetakPdfChk/{id_barang}', [Cbarang::class,'cetakPdfChk']);

use App\Http\Controllers\Ctoko;
Route::get('/toko', [Ctoko::class,'index']);
Route::post('/toko/store', [Ctoko::class,'store']);
Route::get('/scan_toko', [Ctoko::class,'scan_toko']);
Route::post('/scan_toko/getLocationToko',[Ctoko::class,'getLocationToko']);
Route::post('/scan_toko/hasil',[Ctoko::class,'getDistanceFromLatLonInKm']);
Route::get('/toko/export/{id}', [Ctoko::class, 'export'] );

use App\Http\Controllers\CSSE;
Route::get('/console', [CSSE::class,'console']);
Route::get('/sseview', [CSSE::class,'sseview']);
Route::get('/sse',[CSSE::class,'sse']);
Route::post('/console/update-antrian', [CSSE::class,'updateAntrian']);
Route::post('/console/reset-antrian', [CSSE::class,'resetAntrian']);

use App\Http\Controllers\ScoreboardController;
Route::get('/scoreboard-view',[ScoreBoardController::class,'index']);
Route::get('/scoreboard-sse',[ScoreBoardController::class,'sse']);
Route::get('/scoreboard-console',[ScoreBoardController::class,'console']);
Route::post('/scoreboard-console/update-period',[ScoreBoardController::class,'updatePeriod']);
Route::post('/scoreboard-console/reset-period',[ScoreBoardController::class,'resetPeriod']);
Route::post('/scoreboard-console/update-home-name',[ScoreBoardController::class,'updateHomeName']);
Route::post('/scoreboard-console/update-home-score',[ScoreBoardController::class,'updateHomeScore']);
Route::post('/scoreboard-console/reset-home-score',[ScoreBoardController::class,'resetHomeScore']);
Route::post('/scoreboard-console/update-home-foul',[ScoreBoardController::class,'updateHomeFoul']);
Route::post('/scoreboard-console/reset-home-foul',[ScoreBoardController::class,'resetHomeFoul']);
Route::post('/scoreboard-console/update-away-name',[ScoreBoardController::class,'updateAwayName']);
Route::post('/scoreboard-console/update-away-score',[ScoreBoardController::class,'updateAwayScore']);
Route::post('/scoreboard-console/reset-away-score',[ScoreBoardController::class,'resetAwayScore']);
Route::post('/scoreboard-console/update-away-foul',[ScoreBoardController::class,'updateAwayFoul']);
Route::post('/scoreboard-console/reset-away-foul',[ScoreBoardController::class,'resetAwayFoul']);
Route::post('/scoreboard-console/update-home-status',[ScoreBoardController::class,'updateHomeStatus']);
Route::post('/scoreboard-console/update-timer',[ScoreBoardController::class,'updateTimer']);
Route::post('/update-menit-detik',[ScoreBoardController::class,'update_menit_detik']);

Auth::routes();

use App\Http\Controllers\Auth\LoginController;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
// Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/auth/redirect', [LoginController::class,'redirectToProvider']);
Route::get('/auth/callback', [LoginController::class,'handleProviderCallback']);

