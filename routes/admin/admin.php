<?php
/* admin routes */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['prefix'=>'dashbord','middleware' => 'web'],function(){
            /* reset password patient */
            Route::group(['namespace'=>'patient'],function(){
            Route::post('password/email','ForgotPasswordController@sendResetLinkEmail')->name('patient.password.email');
            Route::get('password/reset','ForgotPasswordController@showLinkRequestForm')->name('patient.password.request');
            Route::post('password/reset','ResetPasswordController@reset');
            Route::get('password/reset/{token?}','ResetPasswordController@showResetForm')->name('patient.password.reset');
            });
            /* reset password patient */
            /* 3 pages */
            Route::get('/club','backEndController@club')->name('club.page');
            Route::get('/Insurance','backEndController@Insurance')->name('Insurance.page');
            Route::get('/online','backEndController@online')->name('online.page');
            /* 3 pages */

            Route::get('/index','backEndController@index')->name('indexRoute');
            Route::get('/indexRegister','backEndController@indexRegister')->name('indexRegister');
            /* patient routes */
            Route::get('/patien/register','patienController@register')->name('patienRegister');
            Route::post('/patien/register','patienController@postRegister')->name('patien_post_Register');
            Route::get('/patien/profile/{id}','patienController@profile')->name('patien-profile')->middleware('is_patient');
            Route::get('/patien/edit/profile/{id}','patienController@editProfile')->name('edit.profile')->middleware('is_patient');
            Route::post('patien/update/profile/{id}','patienController@updateProfile')->name('update.profile');
            Route::get('/patien/logout','patienController@logout')->name('patien.logout');
            Route::get('/patien/edit/data/{id}','patienController@editData')->name('edit.data.profile');
            Route::put('/patien/update/data/{id}','patienController@updateData')->name('update.data.profile');
            Route::get('/patien/sendEmail/{id}','patienController@sendEmail')->name('patient_send_email');
            Route::get('/patien/verify/{id}','patienController@verifyPatient')->name('verifyPatient');
            Route::get('/verifyCode','backEndController@verify');
            Route::post('/verifyCode','backEndController@postVerify')->name('postVerify');
            Route::get('/ver','patienController@verfi');
            /* old pescription route */
            Route::get('/patien/old_pescription/{id}','patienController@getOldpescription')->name('get_old_pescription');
            Route::get('/patien/{id}/download/pdf','patienController@download_pdf')->name('download_pdf');
            /* patient routes */
            /* clinic routes */
            Route::get('/clinic/register','clinicController@register')->name('clinicRegister');
            Route::post('/clinic/register','clinicController@postRegister')->name('clinic_post_Register');
            Route::get('/clinic/edit/profile/{id}','clinicController@editProfile')->name('clinic.edit.profile')->middleware('is_clinic');
            Route::get('/clinic/profile/{id}','clinicController@profile')->name('clinic.profile')->middleware('is_clinic');
            Route::get('/clinic/logout','clinicController@logout')->name('clinic.logout');
            Route::get('/clinic/{id}/patient/search','clinicController@search')->name('clinic.patient.search')->middleware('is_clinic');
            Route::put('/clinic/profile/{id}','clinicController@updateProfile')->name('clinic.update.profile');
            Route::post('/clinic/{id}/raoucata','clinicController@storeRaoucata')->name('store_clinic_Raoucata');
            Route::post('/clinic/add/analazes/{id}','clinicController@patient_clinic_add_analzes')->name('patient_clinic_add_analzes');
            Route::post('/clinic/add/rays/{id}','clinicController@patient_clinic_add_rays')->name('patient_clinic_add_rays');
            Route::get('/clinic/verify/{id}','clinicController@verifyClinic')->name('verifyClinic');
            Route::get('/clinic/sendEmail/{id}','clinicController@sendEmail')->name('clinic_send_email');
            Route::get('/clinic/as_doctor/{id}','clinicController@as_a_doctor')->name('clinic_as_doctor');
            Route::get('/clinic/as_doctor/{id}/labs','clinicController@get_search_lab')->name('clinic_get_search_lab');
            Route::get('/clinic/as_doctor_search/{id}/labs','clinicController@post_search_lab')->name('clinic_post_search_lab');
            Route::get('/clinic/as_doctor/{id}/xray','clinicController@get_search_xray')->name('clinic_get_search_xray');
            Route::get('/clinic/as_doctor_search/{id}/xray','clinicController@post_search_xray')->name('clinic_post_search_xray');
            Route::get('/clinic/as_doctor/{id}/pharmacy','clinicController@get_search_pharmacy')->name('clinic_get_search_pharmacy');
            Route::get('/clinic/as_doctor_search/{id}/pharmacy','clinicController@post_search_pharmacy')->name('clinic_post_search_pharmacy');
            Route::post('/clinic/{id}/add/doctor','clinicController@clinic_add_doctor')->name('clinic_add_doctor');
            Route::DELETE('/clinic/{id}/delete/doctor/{doctor_id}','clinicController@clinic_delete_doctor')->name('clinic_delete_doctor');
            /* clinic routes */
            /* hosptail routes */
            Route::get('/hosptail/register','hosptailController@register')->name('hosptailRegister');
            Route::post('/hosptail/register','hosptailController@postRegister')->name('hosptail_post_Register');
            Route::get('/hosptail/edit/profile/{id}','hosptailController@editProfile')->name('hosptail.edit.profile')->middleware('is_hosptail');
            Route::put('/hosptail/profile/{id}','hosptailController@updateProfile')->name('hosptail.update.profile');
            Route::get('/hosptail/profile/{id}','hosptailController@profile')->name('hosptail.profile')->middleware('is_hosptail');
            Route::get('/hosptail/logout','hosptailController@logout')->name('hosptail.logout');
            Route::get('/hosptail/{id}/patient/search','hosptailController@search')->name('hosptail.patient.search')->middleware('is_hosptail');
            Route::post('/hosptail/{id}/raoucata','hosptailController@storeRaoucata')->name('store_hosptail_Raoucata');
            Route::post('/hosptail/add/analazes/{id}','hosptailController@patient_hosptail_add_analzes')->name('patient_add_analzes');
            Route::post('/hosptail/add/rays/{id}','hosptailController@patient_hosptail_add_rays')->name('patient_add_rays');
            Route::get('/hosptail/verify/{id}','hosptailController@verifyhosptail')->name('verifyhosptail');
            Route::get('/hosptail/sendEmail/{id}','hosptailController@sendEmail')->name('hosptail_send_email');
            Route::get('/hosptail/as_doctor/{id}','hosptailController@as_a_doctor')->name('hosptail_as_doctor');
            Route::get('/hosptail/as_doctor/{id}/labs','hosptailController@get_search_lab')->name('get_search_lab');
            Route::get('/hosptail/as_doctor_search/{id}/labs','hosptailController@post_search_lab')->name('post_search_lab');
            Route::get('/hosptail/as_doctor/{id}/xray','hosptailController@get_search_xray')->name('get_search_xray');
            Route::get('/hosptail/as_doctor_search/{id}/xray','hosptailController@post_search_xray')->name('post_search_xray');
            Route::get('/hosptail/as_doctor/{id}/pharmacy','hosptailController@get_search_pharmacy')->name('get_search_pharmacy');
            Route::get('/hosptail/as_doctor_search/{id}/pharmacy','hosptailController@post_search_pharmacy')->name('post_search_pharmacy');
            Route::post('/hosptail/{id}/add/doctor','hosptailController@hosptail_add_doctor')->name('hosptail_add_doctor');
            Route::post("hosptail/{id}/add/result/rays",'hosptailController@addResult_rays')->name('add_Result_rays');
            Route::post("hosptail/{id}/add/result/analzes",'hosptailController@addResult_analzes')->name('add_Result_analzes');
            Route::get('/hosptail/{id}/login/doctor','hosptailController@loginDoctor')->name('loginDoctor');
            Route::post('/hosptail/{id}/login/doctor','hosptailController@post_loginDoctor')->name('post_loginDoctor');
            Route::get('/hosptail/{id}/delete/doctor/{doctor_id}','hosptailController@hosptail_delete_doctor')->name('hosptail_delete_doctor');
            /* hosptail routes */
            /* xray routes */
            Route::get('/xray/register','xrayController@register')->name('xrayRegister');
            Route::post('/xray/register','xrayController@postRegister')->name('xray_post_Register');
            Route::get('/xray/profile/{id}','xrayController@profile')->name('xray.profile')->middleware('is_xray');
            Route::get('xray/edit/profile/{id}','xrayController@editProfile')->name('xray.edit.profile')->middleware('is_xray');
            Route::put('/xray/update/profile/{id}','xrayController@updateProfile')->name('xray.update.profile');
            Route::get('/xray/logout','xrayController@logout')->name('xray.logout');
            Route::get('/xray/{id}/patient/search','xrayController@search')->name('xray.patient.search')->middleware('is_xray');
            Route::get('/xray/verify/{id}','xrayController@verifyXray')->name('verifyXray');
            Route::get('/xray/sendEmail/{id}','xrayController@sendEmail')->name('xray_send_email');
            Route::post('/xray/add/analzes/{id}','xrayController@addStorgeAnalzes')->name('patient_storge_analzes');
            Route::get('/xray/{id}/as_lab','xrayController@xray_as_lab')->name('xray_as_lab');
            /* xray routes */
            /* labs routes */
            Route::get('/labs/register','labsController@register')->name('labsRegister');
            Route::post('/labs/register','labsController@postRegister')->name('labs_post_Register');
            Route::get('/labs/edit/profile/{id}','labsController@editProfile')->name('labs.edit.profile')->middleware('is_lab');
            Route::put('/labs/update/profile/{id}','labsController@updateProfile')->name('labs.update.profile');
            Route::get('/labs/profile/{id}','labsController@profile')->name('labs.profile')->middleware('is_lab');
            Route::get('/labs/logout','labsController@logout')->name('labs.logout');
            Route::get('/labs/{id}/patient/search','labsController@search')->name('labs.patient.search')->middleware('is_lab');
            Route::get('/labs/verify/{id}','labsController@verifyLabs')->name('verifyLabs');
            Route::get('/labs/sendEmail/{id}','labsController@sendEmail')->name('labs_send_email');
            Route::post('/labs/add/rays/{id}','labsController@addStorgeRays')->name('patient_storge_rays');
            Route::get('/labs/{id}/as_xray','labsController@labs_as_xray')->name('labs_as_xray');
            /* labs routes */
            /* pharmacy routes */
            Route::get('/pharmacy/register','pharmacyController@register')->name('pharmacyRegister');
            Route::post('/pharmacy/register','pharmacyController@postRegister')->name('pharmacy_post_Register');
            Route::get('/pharmacy/profile/{id}','pharmacyController@profile')->name('pharmacy.profile')->middleware('is_pharmacy');
            Route::get('/pharmacy/edit/profile/{id}','pharmacyController@editProfile')->name('pharmacy.edit.profile')->middleware('is_pharmacy');
            Route::put('/pharmacy/update/profile/{id}','pharmacyController@updateProfile')->name('pharmacy.update.profile');
            Route::get('/pharmacy/logout','pharmacyController@logout')->name('pharmacy.logout');
            Route::get('/pharmacy/{id}/patient/search','pharmacyController@search')->name('pharmacy.patient.search')->middleware('is_pharmacy');
            Route::get('/pharmacy/verify/{id}','pharmacyController@verifyPharmacy')->name('verifyPharmacy');
            Route::get('/pharmacy/sendEmail/{id}','pharmacyController@sendEmail')->name('pharmacy_send_email');
            // Route::get('/pharmacy/{id}/patient/getroacata','pharmacyController@getLastRoacata')->name('get.last.roacata');
            /* pharmacy routes */
            /* login route */
            Route::post('/login','backEndController@login')->name('loginRoute');
            /* login route */
            /* check your email page */
            Route::get('/check/email','backEndController@checkEmail')->name('checkEmail');
            /* reset password */
            Route::get('/forgot/password','backEndController@forgotPassword')->name('forgot_password');
            Route::post('/forgot/password','backEndController@post_forgot_password')->name('post_forgot_password');
            Route::get('/update/password/{role}','backEndController@update_new_password')->name('update_new_password_page');
            Route::post('/update/password','backEndController@post_update_new_password')->name('post_update_new_password_page');
            /* reset password */


        });
    });


/* admin routes */



?>
