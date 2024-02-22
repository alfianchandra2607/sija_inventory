<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('barang', BarangController::class)->middleware('auth');

Route::resource('profile', ProfileController::class)->middleware('auth');

Route::resource('barangmasuk', BarangMasukController::class)->middleware('auth');


Route::resource('barangkeluar', BarangKeluarController::class)->middleware('auth');

Route::resource('siswa', SiswaController::class)->middleware('auth');

Route::resource('kategori', KategoriController::class)->middleware('auth');

// Route::resource('siswa', SiswaController::class)->middleware('auth');

Route::resource('dashboard', DashboardController::class)->middleware('auth');


// Route::get('login', [LoginController::class,'index'])->name('login')->middleware('guest');
// Route::post('login', [LoginController::class,'authenticate']);
// Route::post('logout', [LoginController::class,'logout']);

// Route::post('register', [RegisterController::class,'store']);

// Route::get('/dashboard',[DashboardController::class,'index']);

// Route::get('/demo1',[DemoController::class,'demo1']);
// // Route::get('/hello',[DemoController::class,'hello']);

// Route::get('/sija', function () {
//     return"Produk Kreatif dan Kewirausahaan";
// })->name('pkk');
// Route::get('/callexam',[ExamController::class,'respon']);

// Route::get('/callview',[ExamController::class,'call_view']);

// Route::get('/var1',[ExamController::class,'exam01']);

// Route::get('/var2',[ExamController::class,'exam02']);

// Route::get('/exam3',[ExamController::class,'exam03']);

// Route::get('/var3',[ExamController::class,'exam04']);

// Route::resource ('siswa',SiswaController::class);

// Route::get('/home',[HomeController::class,'home']);

// Route::get('/users',[HomeController::class,'users']);

// Route::get('/mygrid',[GridController::class,'index']);

#Route::get('/',[SiswaController::class,'index']);
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', [HomeController::class, 'index']);
    // Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
