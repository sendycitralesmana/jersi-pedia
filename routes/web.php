<?php

use App\Http\Livewire\Approved;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\History;
use App\Http\Livewire\Home;
use App\Http\Livewire\Keranjang;
use App\Http\Livewire\Login;
use App\Http\Livewire\Product;
use App\Http\Livewire\Register;
use App\Http\Livewire\ProductLiga;
use App\Http\Livewire\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', Home::class);
Route::get('/home', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/products', Product::class)->name('products');
Route::get('/products/liga/{ligaId}', ProductLiga::class)->name('products-liga');
Route::get('/products/{id}', ProductDetail::class)->name('products-detail');

Route::get('/keranjang', Keranjang::class)->name('keranjang');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/history', History::class)->name('history');
Route::get('/approved', Approved::class)->name('approved');