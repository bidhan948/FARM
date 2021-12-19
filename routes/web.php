<?php

use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\saetting\CitizenShipController;
use App\Http\Controllers\setting\{
    AnimalController,
    AreaController,
    BusinessController,
    CropAreaController,
    CropController,
    CropTypeController,
    EducationQualificationController,
    EthnicGroupController,
    GenderController,
    GovNonGovFacilityController,
    HelpingOrganizationController,
    IrrigationTypeController,
    LandTypeController,
    MarketingSystemController,
    OrganizationTypeController,
    RegionController,
    SeedSourceController,
    SeedSupplierController
};
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /****************** below route is all for setting****************************/
    Route::prefix('settings')->group(function () {
        Route::resource('gender', GenderController::class);
        Route::resource('citizenship-type', CitizenShipController::class);
        Route::resource('marital-status', MaritalStatusController::class);
        Route::resource('business', BusinessController::class);
        Route::resource('education-qualification', EducationQualificationController::class);
        Route::resource('irrigation-type', IrrigationTypeController::class);
        Route::resource('organization-type', OrganizationTypeController::class);
        Route::resource('marketing-system', MarketingSystemController::class);
        Route::resource('ethnic-group', EthnicGroupController::class);
        Route::resource('region', RegionController::class);
        Route::resource('area', AreaController::class);
        Route::resource('land-type', LandTypeController::class);
        Route::resource('crop-type', CropTypeController::class);
        Route::resource('crop-area', CropAreaController::class);
        Route::resource('crop', CropController::class);
        Route::resource('facility', GovNonGovFacilityController::class);
        Route::resource('helping-organization', HelpingOrganizationController::class);
        Route::resource('animal', AnimalController::class);
        Route::resource('seed-source', SeedSourceController::class);
        Route::resource('seed-supplier', SeedSupplierController::class);
    });
});
