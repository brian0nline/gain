<?php
    
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\UpdateEmailController;

Route::name('moder.')->middleware(['auth', 'adminTwoFactor'])->group(function () {
    
    Route::post('email/{templateId}/update', [UpdateEmailController::class, 'update'])->name('update-template');
    Route::get('tools', function(){
       return view('admin.tools'); 
    })->name('tools');
    
    Route::middleware(['permission:admin', 'isUserActive:active'])->group(function () {

        Route::namespace('Livewire\Admin')->group(function () {
    
            //general site setting
            Route::name('settings.')->namespace('Setting')->group(function () {
                Route::get('settings/general', 'General')->name('general');
                Route::get('settings/security', 'Security')->name('security');
                Route::get('settings/control', 'Control')->name('control');
                Route::get('settings/authentication', 'Authentication')->name('authentication');
            });

            //Email Setting and templates
            Route::name('email.')->namespace('Email')->group(function () {
                Route::get('email/templates', 'Index')->name('templates');
                Route::get('email/settings', 'Config')->name('setting');
                Route::get('email/{templateId}/edit', 'EditTemplate')->name('edit-template');
            
            });


            //Gateway
            Route::name('gateway.')->namespace('Gateway')->group(function () {
                Route::get('gateway/list', 'Index')->name('list');
                Route::get('gateway/manual/list', 'Manual\Index')->name('manual-list');
                Route::get('gateway/manual/create', 'Manual\Create')->name('manual-create');
                Route::get('gateway/{alias}/edit', 'Edit')->name('edit');
            });

            Route::name('deposit.')->namespace('Deposit')->group(function () {
                Route::get('deposit/history', 'Index')->name('index');
                Route::get('deposit/pending', 'Pending')->name('pending');
                Route::get('deposit/view/{deposit}', 'View')->name('view');
                Route::get('user/deposit/{userId}', 'UserDeposit')->name('user.view');
            });

            //Support Tickets
            Route::name('ticket.')->namespace('Support')->group(function () {
                Route::get('tickets/all', 'Index')->name('index');
            });
        });

        Route::namespace('Controllers\Admin')->group(function () {

            Route::resource('/ads', 'AdsZoneController');

            Route::name('ticket.')->prefix('tickets')->group(function () {
                //support Tickets
                Route::get('/pending', 'SupportTicketController@pendingTicket')->name('pending');
                Route::get('/view/{id}', 'SupportTicketController@ticketReply')->name('view');
                Route::post('/reply/{id}', 'SupportTicketController@ticketReplySend')->name('reply');
                Route::get('/download/{ticket}', 'SupportTicketController@ticketDownload')->name('download');
                Route::post('/delete', 'SupportTicketController@ticketDelete')->name('delete');
            });


            // Language Manager
            Route::get('/languages', 'LanguageController@langManage')->name('language.manage');
            Route::post('/languages', 'LanguageController@langStore')->name('language.manage.store');
            Route::post('/languages/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
            Route::post('/languages/update/{id}', 'LanguageController@langUpdate')->name('language.manage.update');
            Route::get('/languages/edit/{id}', 'LanguageController@langEdit')->name('language.key');
            Route::post('/languages/import', 'LanguageController@langImport')->name('language.importLang');



            Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
            Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
            Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');


            // WITHDRAW SYSTEM
            Route::name('withdraw.')->prefix('shop')->group(function () {
                Route::get('pending', 'WithdrawalController@pending')->name('pending');
                Route::get('log', 'WithdrawalController@log')->name('log');
                Route::get('via/{method_id}/{type?}', 'WithdrawalController@logViaMethod')->name('method');
                Route::get('details/{id}', 'WithdrawalController@details')->name('details');
                Route::post('approve', 'WithdrawalController@approve')->name('approve');
                Route::post('reject', 'WithdrawalController@reject')->name('reject');


                // Withdraw Method
                Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
                Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
                Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
                Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
                Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
                Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
                Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
            });

            //user control and details
            // Users Manager
            Route::name('users.')->prefix('users')->group(function () {
                Route::get('/list', 'ManageUsersController@allUsers')->name('all');
                Route::get('active', 'ManageUsersController@activeUsers')->name('active');
                Route::get('banned', 'ManageUsersController@bannedUsers')->name('banned');
                Route::get('email-verified', 'ManageUsersController@emailVerifiedUsers')->name('email.verified');
                Route::get('email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('email.unverified');
                Route::get('sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('sms.unverified');
                Route::get('sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('sms.verified');
                Route::get('with-balance', 'ManageUsersController@usersWithBalance')->name('with.balance');

                Route::get('{scope}/search', 'ManageUsersController@search')->name('search');
                Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('detail');
                Route::post('user/update/{id}', 'ManageUsersController@update')->name('update');
                Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('add.sub.balance');
                Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('email.single');
                Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('do-email.single');
                Route::get('user/login/{id}', 'ManageUsersController@login')->name('login');
                Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('transactions');
                Route::get('user/withdrawals/{id}', 'ManageUsersController@withdrawals')->name('withdrawals');
                Route::get('user/withdrawals/via/{method}/{type?}/{userId}', 'ManageUsersController@withdrawalsViaMethod')->name('withdrawals.method');

                Route::get('login/history/{id}', 'ManageUsersController@userLoginHistory')->name('login.history.single');

                Route::get('send-email', 'ManageUsersController@showEmailAllForm')->name('email.all');
                Route::post('send-email', 'ManageUsersController@sendEmailAll')->name('email.send');
                Route::get('email-log/{id}', 'ManageUsersController@emailLog')->name('email.log');
                Route::get('email-details/{id}', 'ManageUsersController@emailDetails')->name('email.details');
                Route::get('referrals/{id}', 'ManageUsersController@referrals')->name('referrals');
                Route::get('commissions/deposit/{id}', 'ManageUsersController@referralCommissionsDeposit')->name('commissions.deposit');
                Route::get('commissions/buy/{id}', 'ManageUsersController@referralCommissionsBuy')->name('commissions.buy');
                Route::get('commissions/win/{id}', 'ManageUsersController@referralCommissionsWin')->name('commissions.win');
            });

            Route::prefix('referrals')->group(function () {
                //refer
                Route::get('/levels', 'ReferralController@index')->name('referral.index');
                Route::post('/referral', 'ReferralController@store')->name('store.refer');
                Route::get('/referral-status/{type}', 'ReferralController@referralStatusUpdate')->name('referral.status');
                Route::get('/referral-page', 'ReferralController@referralPage')->name('referral.customize');
                Route::post('/referral-page/save', 'ReferralController@updateReferralPage')->name('referral.do-customize');
            });

            Route::prefix('setting')->group(function () {
                Route::post('/control/update', 'SiteSettingController@updateControl')->name('update.setting.control');
            });
        });

        //Notification
        Route::get('notifications', 'Controllers\SiteController@notifications')->name('notifications');
        Route::get('notification/read/{id}', 'Controllers\SiteController@notificationRead')->name('notification.read');
        Route::get('notification/delete/{id}', 'Controllers\SiteController@deleteNotify')->name('notification.delete');
        Route::get('notifications/read-all', 'Controllers\SiteController@notificationReadAll')->name('notifications.readAll');

        Route::namespace('Controllers\Admin\System')->group(function () {

            //offerwall routes
            Route::name('offer.')->prefix('custom/offerwalls')->group(function () {
                Route::get('list', 'OfferSetupController@index')->name('index');
                Route::get('/create', 'OfferSetupController@create')->name('create');
                Route::post('/store', 'OfferSetupController@store')->name('store');
                Route::get('/edit/{offerId}', 'OfferSetupController@edit')->name('edit');
                Route::post('/update/{offerId}', 'OfferSetupController@update')->name('update');
                Route::get('/update-status/{offerId}', 'OfferSetupController@updateStatus')->name('update-status');
                Route::get('/update-pay/{offerId}', 'OfferSetupController@updatePay')->name('update-pay');
                Route::delete('/delete/{offerId}', 'OfferSetupController@delete')->name('delete');
                Route::get('analysis', 'OfferSetupController@analysis')->name('analysis');
            });
            
            Route::name('leader.')->prefix('leaderboard')->group(function(){
               Route::get('/', 'LeaderBoardController@index')->name('index'); 
               Route::post('/store', 'LeaderBoardController@store')->name('store'); 
               Route::get('/change', 'LeaderBoardController@changeStatus')->name('change'); 
            });

            Route::name('offer.builtin.')->prefix('builtin/offerwalls')->group(function(){
                Route::get('list', 'OffersBuiltinController@index')->name('index');
                Route::get('edit', 'OffersBuiltinController@edit')->name('edit');
                Route::post('store', 'OffersBuiltinController@store')->name('store');
                Route::post('update/{id}', 'OffersBuiltinController@update')->name('update');
            });

        });
        
        // countries api
        Route::get('api/users/counrites/count', function(){
            $data = DB::select('SELECT count(DISTINCT(user_id)) as users, country_code FROM `user_logins` GROUP by country_code');
        
            $response = array(); 
            foreach($data as $d){
                $country_code = $d->country_code;
                if($country_code){
                    $response[$country_code] = $d->users;
                }
            }
            return response()->json($response);
        });
    });
});
