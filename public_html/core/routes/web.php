<?php

use App\Services\Postback;
use App\Http\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\System\OfferController;

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
});

    
Route::get('change-lang/{code}', 'Controllers\SiteController@changeLanguage');

Route::get('/', [Welcome::class, 'home'])->name('welcome');

Route::get('placeholder-image/{size}', 'Controllers\SiteController@placeholderImage')->name('placeholder.image');
Route::view('terms-of-service', 'pages.terms')->name('tos');
Route::view('privacy-policy', 'pages.policy')->name('policy');
Route::view('faq', 'pages.faq')->name('faq');
Route::view('chat', 'pages.chat')->name('chat');
Route::view('help-center', 'pages.help')->name('help');



Route::any('offers/builtin/callback/{endpoint}', [Postback::class, 'verify'])->name('offers.builtin.callback')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('offers/custom/callback/{endPoint}', [OfferController::class, 'postBack'])->name('offers.custom.callback');


// cookie concent

Route::get('set-cookie-concent',function(){
    Session::put('cookie_concent', request()->input('cookie_concent'));
})->name('set-cookie-concent');


Route::get('testing', function(){
     $ip = getUserIP();
     dd($ip);
});