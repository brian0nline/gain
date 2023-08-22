<?php

use Illuminate\Support\Facades\Route;




Route::name('user.')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('auth/google', 'Auth\LoginController@googleLogin')->name('google-login');
    Route::get('auth/google/callback', 'Auth\LoginController@googleLoginCallback')->name('google-login-callback');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');
    Route::post('check-mail', 'Auth\RegisterController@checkUser')->name('checkUser');

    Route::get('auth/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('auth/password/email', 'Auth\ForgotPasswordController@sendResetCodeEmail')->name('password.email');
    Route::get('auth/password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code.verify');
    Route::post('auth/password/do-reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('auth/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('auth/password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify.code');
});

Route::name('user.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send.verify.code');
        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify.email');
        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify.sms');
        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

        Route::middleware(['checkStatus'])->group(function () {

            Route::get('settings', 'UserController@profile')->name('profile.setting');
            Route::post('settings', 'UserController@submitProfile')->name('profile.setting.update');
            Route::get('password', 'UserController@changePassword')->name('change.password');
            Route::post('password', 'UserController@submitPassword')->name('change.password.submit');
            Route::post('delete-account', 'UserController@deleteAccount')->name('account.delete');

            //2FA
            Route::get('2fa', 'UserController@show2faForm')->name('twofactor');
            Route::post('2fa/enable', 'UserController@create2fa')->name('twofactor.enable');
            Route::post('2fa/disable', 'UserController@disable2fa')->name('twofactor.disable');

            
            // Withdraw
            Route::get('shop', 'UserController@withdrawMoney')->name('withdraw');
            Route::post('shop', 'UserController@withdrawStore')->name('withdraw.money');
            Route::get('shop/preview', 'UserController@withdrawPreview')->name('withdraw.preview');
            Route::post('shop/do-preview', 'UserController@withdrawSubmit')->name('withdraw.submit');
            Route::get('/shop/history', 'UserController@withdrawLog')->name('withdraw.history');

            // Transaction
            Route::get('money/transactions', 'UserController@transactions')->name('transactions');


            Route::get('referrals', 'UserController@referrals')->name('commissions');

            // Referred Users
            Route::get('referral/level/{level?}', 'UserController@referredUsers')->name('referred');
        });
    });

});

// User Support Ticket
Route::middleware(['auth', 'checkStatus'])->group(function () {
    Route::get('tickets', 'TicketController@supportTicket')->name('ticket');
    Route::get('open-ticket', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('create-ticket', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('tickets/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('tickets/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('tickets/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');

    Route::name('user.offer.')->namespace('System')->middleware('auth')->group(
        function () {
            Route::get('/history/{status?}', 'User\ViewActivityController@userOfferReports')->name('reports');
            Route::get('/check-user-notify', 'User\ViewActivityController@checkUserNotify')->name('check-user-notify');
            Route::get('/update-user-notify', 'User\ViewActivityController@updateUserNotify')->name('update-user-notify');
        }
    );


});


// api offerwalls 




Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');
