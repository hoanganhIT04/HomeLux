<?Php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::post('/checkout', [CheckoutController::class, 'checkout']);
