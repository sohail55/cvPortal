<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::group(['prefix' => 'administrator'], function () {
    Route::post('login', 'LoginController@login')->name('adminLogin');
    Route::get('signout', 'LoginController@signout')->name('signout');
});
Route::get('signIn', 'LoginController@signIn')->name('signIn');
Route::get('signUp', 'LoginController@signUp')->name('signUp');
Route::get('forgotPassword', 'LoginController@forgotPassword')->name('forgotPassword');
Route::post('userSignup', 'LoginController@userSignup')->name('userSignup');
Route::get('recoverPassword', 'LoginController@recoverPassword')->name('recoverPassword');
Route::group(['middleware' => 'usersession'], function () {
Route::post('login', 'LoginController@login')->name('Login');
    
    
    
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('profile', 'HomeController@profile')->name('profile');
    Route::get('skills', 'HomeController@skills')->name('skills');
    Route::get('education', 'HomeController@education')->name('education');
    Route::get('reference', 'HomeController@refrence')->name('reference');
    Route::get('language', 'HomeController@language')->name('language');
    Route::get('experience', 'HomeController@experience')->name('experience');
    Route::get('certification', 'HomeController@certification')->name('certification');
    Route::get('personal', 'HomeController@personal')->name('personal');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::get('armyForm', 'HomeController@armyForm')->name('armyForm');
    Route::get('preview', 'HomeController@preview')->name('preview');
    Route::get('saveProfileInfo', 'HomeController@saveProfileInfo')->name('saveProfileInfo');
    Route::get('saveProfileExperinceInfo', 'HomeController@saveProfileExperinceInfo')->name('saveProfileExperinceInfo');
    Route::get('saveProfileCertificationInfo', 'HomeController@saveProfileCertificationInfo')->name('saveProfileCertificationInfo');
    Route::get('saveProfileSkillsInfo', 'HomeController@saveProfileSkillsInfo')->name('saveProfileSkillsInfo');
    Route::get('saveProfileReferenceInfo', 'HomeController@saveProfileReferenceInfo')->name('saveProfileReferenceInfo');

    Route::get('/getDegrees/{id}', 'HomeController@getDegrees');
    Route::get('/getProvinces/{id}', 'HomeController@getProvinces');
    Route::get('/getCities/{id}', 'HomeController@getCities');
    Route::get('getEducationById/{id}', 'HomeController@getEducationById')->name('getEducationById');
    Route::get('getExprienceById/{id}', 'HomeController@getExprienceById')->name('getExprienceById');
    Route::get('getCertificationById/{id}', 'HomeController@getCertificationById')->name('getCertificationById');
    Route::get('getSkillById/{id}', 'HomeController@getSkillById')->name('getSkillById');
    Route::get('getReferenceById/{id}', 'HomeController@getReferenceById')->name('getReferenceById');
    Route::get('getJobById/{id}', 'HomeController@getJobById')->name('getJobById');


    Route::post('storeEducationalInfo', 'HomeController@storeEducationalInfo')->name('storeEducationalInfo');
    Route::post('storePersonalInfo', 'HomeController@storePersonalInfo')->name('storePersonalInfo');
    Route::post('storeContactInfo', 'HomeController@storeContactInfo')->name('storeContactInfo');
    Route::post('storeExperienceInfo', 'HomeController@storeExperienceInfo')->name('storeExperienceInfo');
    Route::post('storeCertificationInfo', 'HomeController@storeCertificationInfo')->name('storeCertificationInfo');
    Route::post('storeSkillsInfo', 'HomeController@storeSkillsInfo')->name('storeSkillsInfo');
    Route::post('storeReferenceInfo', 'HomeController@storeReferenceInfo')->name('storeReferenceInfo');
    Route::post('storeArmyPersonInfo', 'HomeController@storeArmyPersonInfo')->name('storeArmyPersonInfo');

    Route::post('deleteSkillsInfo/{id}', 'HomeController@deleteSkillsInfo')->name('deleteSkillsInfo');
    
    Route::post('applyJob', 'HomeController@applyJob')->name('applyJob');
    Route::get('jobsHistory', 'HomeController@jobsHistory')->name('jobsHistory');
    Route::get('pdfview',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));
 });

   
