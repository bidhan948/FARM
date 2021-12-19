<?php

use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\saetting\CitizenShipController;
use App\Http\Controllers\setting\AnimalController;
use App\Http\Controllers\setting\AreaController;
use App\Http\Controllers\setting\BusinessController;
use App\Http\Controllers\setting\CropController;
use App\Http\Controllers\setting\EducationQualificationController;
use App\Http\Controllers\setting\EthnicGroupController;
use App\Http\Controllers\setting\GenderController;
use App\Http\Controllers\setting\GovNonGovFacilityController;
use App\Http\Controllers\setting\HelpingOrganizationController;
use App\Http\Controllers\setting\IrrigationTypeController;
use App\Http\Controllers\setting\LandTypeController;
use App\Http\Controllers\setting\MarketingSystemController;
use App\Http\Controllers\setting\OrganizationTypeController;
use App\Http\Controllers\setting\RegionController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /****************** below route is all for setting****************************/
    Route::prefix('settings')->group(function () {
        Route::resource('gender',GenderController::class);
        Route::resource('citizenship-type',CitizenShipController::class);
        Route::resource('marital-status',MaritalStatusController::class);
        Route::resource('business',BusinessController::class);
        Route::resource('education-qualification',EducationQualificationController::class);
        Route::resource('irrigation-type',IrrigationTypeController::class);
        Route::resource('organization-type',OrganizationTypeController::class);
        Route::resource('marketing-system',MarketingSystemController::class);
        Route::resource('ethnic-group',EthnicGroupController::class);
        Route::resource('region',RegionController::class);
        Route::resource('area',AreaController::class);
        Route::resource('land-type',LandTypeController::class);
        Route::resource('crop',CropController::class);
        Route::resource('facility',GovNonGovFacilityController::class);
        Route::resource('helping-organization',HelpingOrganizationController::class);
        Route::resource('animal',AnimalController::class);
    });
});
