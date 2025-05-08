<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GuestController;
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
    return view('guest/home');
});

Route::get('/genji-kost', [KamarController::class, 'genji'])->name('genji-kost');
Route::get('/genji-kost/show/{id}', [KamarController::class, 'lihat'])->name('genji-kost/show');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [KamarController::class, 'guest'])->name('home');
    Route::get('/show/{id}', [KamarController::class, 'show'])->name('show');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name("checkout/process");
    Route::get('/checkout/{transaction}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout-success/{transaction}', [CheckoutController::class, 'success'])->name('checkout-success');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
    Route::get('/penyewa/dashboard', [HomeController::class, 'penyewaHome'])->name('penyewa/dashboard');
    Route::get('/penyewa/pembayaran', [SewaController::class, 'penyewaBayar'])->name('penyewa/pembayaran');
    Route::get('/penyewa/pembayaran/bayar', [SewaController::class, 'historyPembayaran'])->name('penyewa/pembayaran/bayar');
    Route::get('/penyewa/bayar', [SewaController::class, 'bayarDulu'])->name('penyewa/bayar');
    Route::post('/penyewa/bayar/bayarProses', [SewaController::class, 'bayarProses'])->name('penyewa/bayar/bayarProses');
    
});
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/auth/ubah-password', [HomeController::class, 'showChangePasswordForm'])->name('/auth/ubah-password');
    Route::post('/auth/ubah-password', [HomeController::class, 'changePassword'])->name('/auth/ubah-password');
 
    Route::get('/profile', [AdminController::class, 'profilepage'])->name('profile');

    Route::get('/admin/kamar', [KamarController::class, 'index'])->name('admin/kamar');
    Route::get('/admin/kamar/create', [KamarController::class, 'create'])->name('admin/kamar/create');
    Route::post('/admin/kamar/store', [KamarController::class, 'store'])->name('admin/kamar/store');
    Route::get('/admin/kamar/show/{id}', [KamarController::class, 'show'])->name('admin/kamar/show');
    Route::get('/admin/kamar/edit/{id}', [KamarController::class, 'edit'])->name('admin/kamar/edit');
    Route::put('/admin/kamar/edit/{id}', [KamarController::class, 'update'])->name('admin/kamar/update');
    Route::delete('/admin/kamar/destroy/{id}', [KamarController::class, 'destroy'])->name('admin/kamar/destroy');

    Route::get('/admin/penyewa', [UserController::class, 'index'])->name('admin/penyewa');
    Route::post('/admin/penyewa/store', [UserController::class, 'store'])->name('admin/penyewa/store');
    Route::get('/admin/penyewa/edit/{id}', [UserController::class, 'edit'])->name('admin/penyewa/edit');
    Route::put('/admin/penyewa/edit/{id}', [UserController::class, 'update'])->name('admin/penyewa/update');
    Route::delete('/admin/penyewa/destroy/{id}', [UserController::class, 'destroy'])->name('admin/penyewa/destroy');

    Route::get('/admin/pembayaran', [SewaController::class, 'bayar'])->name('admin/pembayaran');
    Route::get('/admin/pembayaran/invoice/{id}', [SewaController::class, 'invoice'])->name('admin/pembayaran/invoice');
    Route::get('/transaksi', [CheckoutController::class, 'bayar'])->name("transaksi");

    Route::get('/admin/pembayaran/approve/{id}', [SewaController::class, 'approve'])->name('admin/pembayaran/approve');
});