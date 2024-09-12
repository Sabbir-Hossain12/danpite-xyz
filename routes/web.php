<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\SupportServiceController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\WebController;
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

Route::post('support-service', [SupportServiceController::class, 'SupportService'])->name('support.service');

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('all-services', 'allServices');
    Route::get('interior', 'interior');
    Route::get('priceing', 'priceing');
    Route::get('contact-us', 'contact');
    Route::get('about-us', 'aboutus');
    // Route::get('services', [WebController::class, 'services']);
    Route::get('services/{slug}', 'servicesData')->name('services.category');
    Route::get('sub-services/{slug}', 'sub_servicesData')->name('services.sub.category');
    Route::get('terms-of-service', 'terms');
    Route::get('privacy-policy', 'privacy');

    Route::get('daily-blogs', 'blogs');
    Route::post('/blogs/comments', 'blogComments')->name('blog.comments');
    Route::post('/blogs/like', 'blogLike')->name('blog.like');
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Route::get('/aboutUs-data', [AboutUsController::class, 'aboutData'])->name('administrator.aboutUs.data');

require __DIR__.'/auth.php';
require __DIR__.'/administrator.php';
