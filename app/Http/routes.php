<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return Redirect::route('dashboard');
});

Route::get('/clear-cache', function() {

   Artisan::call('optimize:clear');
   return "Cleared!";

});

Route::any('/ubm_getbanner','campaigns\campaignsController@getbanner');

Route::any('/ubm_banner_click/{id}','campaigns\campaignsController@bannerClick');

Route::any('/check-advertiser-account','owner\ownerController@CheckAcc');

Route::any('/campaigns/share/{id}','campaigns\campaignsController@share');

Route::any('/campaigns/inccampview/{id}','campaigns\campaignsController@inccampview');

Route::any('/campaigns/verified','campaigns\orderHistoryController@credit');

Route::any('/api/check-if-url-is-valid-campaign','campaigns\orderHistoryController@checkIfUrlIsValidCampaign');

Route::any('/campaigns/formbuttonid','campaigns\orderHistoryController@formdetail');

Route::get('/', ['as'=> 'home', 'uses' => 'AdminController@home']);
Route::get('how-it-works', ['as'=> 'how-it-works', 'uses' => 'AdminController@howitworks']);
Route::get('actions-and-events', ['as'=> 'actions-and-events', 'uses' => 'AdminController@actionsandevents']);
Route::get('contact', ['as'=> 'contact', 'uses' => 'AdminController@contact']);
Route::get('privacy', ['as'=> 'privacy', 'uses' => 'AdminController@privacy']);
Route::get('terms', ['as'=> 'terms', 'uses' => 'AdminController@terms']);
Route::get('about', ['as'=> 'about', 'uses' => 'AdminController@about']);
Route::get('pricing', ['as'=> 'pricing', 'uses' => 'AdminController@pricing']);
// Route::get('/', function () {
// 	return Redirect::route('dashboard');
// });

Route::group(['middleware' => 'superAdminAuth'], function(){
    Route::get('dashboard', ['as'=> 'dashboard', 'uses' => 'AdminController@dashboard']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::controller('password', 'RemindersController');
    Route::get('login', ['as'=>'login', 'uses' => 'Auth\AuthController@login']);
    Route::get('register', ['as'=>'register', 'uses' => 'UsersController@create']);
    Route::post('user/store', ['as'=>'user.store', 'uses' => 'UsersController@store']);
    Route::get('user/activate', ['as'=>'activation', 'uses' => 'UsersController@activate']);
    Route::get('register/activate', ['as'=>'user.doactivate', 'uses' => 'UsersController@doActivate']);
    Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));

    Route::post('reset', ['as' => 'reset-password', 'uses' => 'Auth\AuthController@resetRequest']);
    Route::get('login/reset_password/users', ['as' => 'reset-page', 'uses' => 'Auth\AuthController@resetPage']);
    Route::get('login/reset_password/phone', ['as' => 'reset-page-phone', 'uses' => 'Auth\AuthController@resetPagePhone']);
    Route::post('login/reset_password/users', ['as' => 'reset-process', 'uses' => 'Auth\AuthController@resetProcess']);
});

//Messages  from Agent
Route::group(['prefix' => 'messages'], function() {
    Route::get('/', ['as' => 'admin_inbox', 'uses' => 'MessageController@index']);
    Route::get('sent', ['as' => 'admin_sent_message', 'uses' => 'MessageController@sent']);
    Route::get('read/{id}', ['as' => 'admin_message_read', 'uses' => 'MessageController@show']);
    Route::post('read/{id}', ['as' => 'admin_message_read', 'uses' => 'MessageController@reply']);
    Route::get('compose', ['as' => 'admin_message_compose', 'uses' => 'MessageController@create']);
    Route::post('compose', 'MessageController@store');
    Route::get('message-inbox-user', ['as' => 'message_inbox_admin', 'uses' => 'MessageController@messageInboxData']);
    Route::get('message-sent-admin', ['as' => 'message_sent_admin_data', 'uses' => 'MessageController@messageSentData']);
});


//Messages  from Agent
Route::group(['prefix' => 'messages'], function() {
    Route::get('/', ['as' => 'agent_inbox', 'uses' => 'MessageController@index']);
    Route::get('sent', ['as' => 'agent_sent_message', 'uses' => 'MessageController@sent']);
    Route::get('read/{id}', ['as' => 'message_read', 'uses' => 'MessageController@show']);
    Route::post('read/{id}', ['as' => 'message_read', 'uses' => 'MessageController@reply']);
    Route::get('compose', ['as' => 'message_compose', 'uses' => 'MessageController@create']);
    Route::post('compose', ['as' => 'message_compose', 'uses' => 'MessageController@store']);
    Route::get('message-inbox-user', ['as' => 'message_inbox_user', 'uses' => 'MessageController@messageInboxData']);
    Route::get('message-sent-user', ['as' => 'message_sent_user_data', 'uses' => 'MessageController@messageSentData']);
});


Route::group(array('middleware' => 'auth'), function () {
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
    Route::get('edit-profile', ['as' => 'edit.profile', 'uses' => 'UsersController@edit']);
    Route::post('edit-profile', ['as' => 'post.edit.profile', 'uses' => 'UsersController@update']);
    Route::post('edit-photo', ['as' => 'post.edit.photo', 'uses' => 'UsersController@photoUpdate']);
    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
    Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
    Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));
    

    /* Withraw Request */

    Route::get('withdraw/request', ['as' => 'withdraw.create', 'uses' => 'owner\withDrawController@index']);
    Route::post('withdraw/requestprocess', ['as' => 'withdraw.requestprocess', 'uses' => 'owner\withDrawController@withdrawRequestProcess']);
    Route::any('withdraw/history', ['as' => 'withdraw.history', 'uses' => 'owner\withDrawController@withdrawHistory']);
    Route::any('withdraw/requested', ['as' => 'withdraw.requested', 'uses' => 'owner\withDrawController@withdrawRequested']);
    Route::any('withdraw/account-info/{withdraw_id}','owner\withDrawController@accountInfo');
    Route::any('withdraw/updated','owner\withDrawController@withdrawUpdated');


    //-----User Views-----

    //Transfer Requests
    Route::get('transfer/request', ['as' => 'pending.create', 'uses' => 'Wallet\PendingTransferController@create']);
    Route::post('transfer/request', ['as' => 'pending.store', 'uses' => 'Wallet\PendingTransferController@store']);

    // Feedback
    Route::get('report',array('as'=>'getcontact','uses'=>'PageController@getContact'));
    Route::post('report',array('as'=>'postcontact','uses'=>'PageController@postContact'));


    //Paypal Payments
    Route::get('paypal/request', ['as' => 'paypal.create', 'uses' => 'PaypalController@create']);
    Route::post('paypal/payment', ['as' => 'paypal.payment', 'uses' => 'PaypalController@paymentPaypal']);
    Route::get('paypal/confirmation', ['as' => 'paypal.confirmation', 'uses' => 'PaypalController@confirmPaypal']);


    //product
    Route::get('product/view', ['as' => 'product.view', 'uses' => 'ProductController@view']);

    Route::get('product/buy/{id}', ['as' => 'product.buy', 'uses' => 'ProductController@buy']);
    
    //professional
    Route::get('professional', ['as' => 'professional.view', 'uses' => 'ProfessionalController@view']);
    Route::get('professional/buy/{id}', ['as' => 'professional.buy', 'uses' => 'ProfessionalController@buy']);
    
    //professional
    Route::get('explorer', ['as' => 'explorer.view', 'uses' => 'ExplorerController@view']);
    Route::get('explorer/buy/{id}', ['as' => 'explorer.buy', 'uses' => 'ExplorerController@buy']);

    // Manage Campaigns
   

    Route::group(['prefix' => 'campaigns-category'], function() {
        Route::any('/add-campaigns-category','category\categoryController@create');
        Route::any('/view-campaigns-category','category\categoryController@index');
        Route::any('/store','category\categoryController@store');
        Route::any('/edit-campaigns-category/{id}','category\categoryController@store');
        Route::any('/change-status','category\categoryController@status');
        Route::any('/check-category','category\categoryController@check');
        Route::any('/update','category\categoryController@store');
        Route::any('/delete','category\categoryController@destroy');
    });

    Route::any('/get-campaign-categories-as-json','categoriesJson@getAllCategories');

    Route::group(['prefix' => 'campaigns'], function() {
        Route::any('/view-campaigns','campaigns\campaignsController@index');
        Route::any('/add-campaigns','campaigns\campaignsController@create');
        Route::any('/store','campaigns\campaignsController@store');
        Route::any('/edit-campaigns/{id}','campaigns\campaignsController@store');
        Route::any('/update','campaigns\campaignsController@store');
        Route::any('/delete','campaigns\campaignsController@destroy');
        
        Route::any('/view','campaigns\campaignsController@view');
        Route::any('/show/{id}','campaigns\campaignsController@show');
        Route::any('/view/{id}','campaigns\campaignsController@viewbyArtist');
        Route::any('/advertisers','campaigns\campaignsController@advertisers');
        Route::any('/filter','campaigns\campaignsController@filter');
        
        Route::any('/embedding','campaigns\campaignsController@embedding');
        
        Route::any('/view-all','campaigns\campaignsController@viewall');
       
        Route::any('/active-campaigns','campaigns\campaignsController@activeCamp');
       
        Route::any('/view-my-campaign/{id}','campaigns\campaignsController@viewCamp');
        
        Route::any('/run/{id}','campaigns\orderHistoryController@run');
        
        Route::any('/ChngeStatusToApprove/{id}','campaigns\campaignsController@ChngeToApprove');
        Route::any('/ChngeStatusToReject/{id}','campaigns\campaignsController@ChngeToReject');
    });
    // commission-ratio

    Route::any('/commission-ratio','commission\commissionratioController@create');
    Route::any('/commission-ratio/store','commission\commissionratioController@store');
    Route::any('/commission-ratio/update','commission\commissionratioController@store');
    
    // company-profile

    Route::any('/company-profile','company\companyprofileController@create');
    Route::any('/company-profile/store','company\companyprofileController@store');
    Route::any('/company-profile/update','company\companyprofileController@store');

    // Manage Owner
   
    Route::any('/advertiser/add-advertiser','owner\ownerController@fetch');
    Route::any('/advertiser/view-advertiser','owner\ownerController@index');
    Route::any('/advertiser/watchjs','owner\ownerController@watchjs');
    Route::any('/advertiser/store','owner\ownerController@store');
    Route::any('/advertiser/editOwner/{id}','owner\ownerController@store');
    Route::any('/advertiser/update','owner\ownerController@store');
    Route::any('/advertiser/delete','owner\ownerController@destroy');

    Route::any('/advertiser/CheckEmail','owner\ownerController@CheckEmail');
    Route::any('/advertiser/CheckPhone','owner\ownerController@CheckPhone');

// Notification 

    Route::any('/notify/view-notifications', 'notify\notificationController@notify');
    Route::any('/notify/ChngeStatus', 'notify\notificationController@ChngeStatus');

// Wallet History

    Route::any('/wallet/view-wallet-history', 'WalletHistory\walletHistoryController@index');
    Route::any('/wallet/search-wallet-history', 'WalletHistory\walletHistoryController@fetch');
    Route::any('/wallet/search', 'WalletHistory\walletHistoryController@filter');
    
    Route::any('/wallet-credit/paystack', 'WalletHistory\walletHistoryController@paystackCredit');

});
   
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
    Route::get('allUsers', ['as' => 'admin.allusers', 'uses' => 'AdminController@index1']);
    Route::get('allUsersInactive', ['as' => 'admin.allusers2', 'uses' => 'AdminController@index2']);
    Route::get('allUsersByCountry', ['as' => 'admin.allusers3', 'uses' => 'AdminController@index3']);
    Route::get('user/{id}/show', ['as' => 'user.show', 'uses' => 'AdminController@show']);
    Route::any('/user/delete', ['as' => 'user.delete', 'uses' => 'AdminController@destroy']);
    Route::get('user/{id}/edit', ['as' => 'user.edit', 'uses' => 'AdminController@edit']);
    Route::get('allUsers/edit/{id}', ['as' => 'user.edit', 'uses' => 'AdminController@edit']);
    Route::put('allUsers/{id}', ['as' => 'post.edit.user', 'uses' => 'AdminController@update']);

    //Route::get('product/{id}', ['as' => 'product.view', 'uses' => 'ProductController@view']);

    Route::get('product/{id}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
    Route::delete('product/{id}', ['as' => 'product.delete', 'uses' => 'ProductController@destroy']);
    Route::get('products/create', ['as' => 'product.create', 'uses' => 'ProductController@create']);
    Route::post('product/create', ['as' => 'product.store', 'uses' => 'ProductController@store']);  

    //Route::get('product/{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
    //Route::post('product/{id}/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);

    Route::get('product/{id}/edit',['as'=>'product.edit', 'uses' => 'ProductController@edit']);
    Route::put('product/{id}',['as' => 'product.update', 'uses' => 'ProductController@update']);
 
    //Route::get('cards/create',['as' => 'cards.create', 'uses' => 'CardController@create']);
    //Route::resource('products','ProductController');

    //Route::match(['get', 'post'], '/product', 'ProductController@show');
    //-----Admin Views-----//

    // Pending Transfer Requests //

    Route::get('pending/index', ['as' => 'pending.index', 'uses' => 'Wallet\PendingTransferController@index']);
    Route::get('pending/{id}/accept', ['as' => 'pending.accept', 'uses' => 'Wallet\PendingTransferController@accept']);
    Route::delete('pending/index/{id}', ['as' => 'pending.decline', 'uses' => 'Wallet\PendingTransferController@decline']);

});

/*
|
|-------------------------------------------------------------------------
|                     Api Routes Starts                                     
|-------------------------------------------------------------------------   
|
*/

Route::group(['prefix' => 'api'], function() {
    
    // Basic Get Data Api Routes

    Route::any('/gift/view-gift','api\ApiGiftController@ApiViewGift');
    Route::any('/gift/send-gift','api\ApiGiftController@ApiSendGift');
    Route::any('/gift/sent-gift','api\ApiGiftController@ApiSentAll');
    Route::any('/gift/received-gift','api\ApiGiftController@ApiReceiveAll');
    Route::any('/gift/get-AllGiftProduct','api\ApiGiftController@ApiAllGiftProduct');
    Route::any('/gift/get-GiftReason','api\ApiGiftController@ApiGiftReason');
    Route::any('/gift/DetailView', 'api\ApiGiftController@ApiDetailView');

    // Ajax Based Data Fetch Api Routes

    Route::any('/getProductPrice', 'api\ApiGiftController@ApiGetPrice');
    Route::any('/getReceiverDet', 'api\ApiGiftController@ApiGetReceiverDet');
    Route::any('/CheckClient', 'api\ApiGiftController@ApiCheckClient');

    // Search Api Routes 

    Route::any('/filter/gift', 'api\ApiGiftController@ApiFilter');
    Route::any('/get/vendors', 'api\ApiGiftController@ApiGetVendor');
    Route::any('/get/categories', 'api\ApiGiftController@ApiGetCatgry');
    Route::any('/get/MinPrice', 'api\ApiGiftController@ApiMinPrice');
    Route::any('/get/MaxPrice', 'api\ApiGiftController@ApiMaxPrice');
    
    // Register & login Api Routes

    Route::any('/login', 'api\ApiGiftController@ApiLogin');
    Route::any('/register', 'api\ApiGiftController@ApiRegister');

});

/*
|
|-------------------------------------------------------------------------
|                     Api Routes Ends                                     
|-------------------------------------------------------------------------   
|
*/

// paypal //

Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));

Route::get('/clearr-cache', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('schedule:run');	
    return "Cache is cleared";
});

Route::get('/addadjs', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('schedule:run');	
    return "inserted data";
});
