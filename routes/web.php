<?php


use App\Models\Product;
use App\Http\Controllers\order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\ProductController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $products = Product::all();
        return view('dashboard', ['products' => $products]);
    })->name('dashboard');

    Route::resource('user', UserController::class)->only(['index' , 'update' , 'destroy' , 'store'])->middleware("role:Owner");
    Route::resource('product', ProductController::class)->middleware('role:Owner');
    

    Route::resource('teamsp', TeamController::class);
    Route::get('teamsp/messages', [TeamController::class, 'index'])->name('messages.index');  
    Route::post('teamsp/messages', [TeamController::class, 'store'])->name('messages.store');
    Route::get('teamsp/messages/{user}', [TeamController::class, 'show'])->name('messages.show');
    

    Route::resource('order', OrderController::class)->middleware('role:Owner');
    Route::resource('MyOrder', MyOrderController::class);
    Route::post('order/{order}/complete', [OrderController::class, 'complete'])->name('order.complete')->middleware('role:Owner');
    Route::resource('order_page', OrderPController::class);

});


