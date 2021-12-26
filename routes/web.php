<?php

use App\Http\Controllers\agriculture\AgricultureDetailController;
use App\Http\Controllers\animal\AnimalDetailController;
use App\Http\Controllers\land\LandController;
use App\Http\Controllers\land_detail\LandDetailController;
use Illuminate\Support\Facades\Route;
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
    MainMarketController,
    MarketingSystemController,
    OrganizationTypeController,
    ProductionAnimalController,
    RegionController,
    SeedSourceController,
    SeedSupplierController,
    UnitController
};

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /****************** below route is all for Land****************************/
    Route::resource('land-owner', LandController::class);
    Route::get('land-detail-add/{land_owner}',[LandDetailController::class,'create'])->name('land_detail_add');
    Route::post('land-detail-add/{land_owner}',[LandDetailController::class,'store'])->name('land_detail_store');
    Route::get('agriculture-detail-add/{land_owner}',[AgricultureDetailController::class,'create'])->name('agriculture_detail');
    Route::post('agriculture-detail-add/{land_owner}',[AgricultureDetailController::class,'store'])->name('agriculture_detail_store');
    Route::get('agriculture-detail/{land_owner}',[AgricultureDetailController::class,'show'])->name('agriculture_detail_show');
    Route::get('animal-add/{land_owner}',[AnimalDetailController::class,'index'])->name('animal_detail_add');
    Route::post('animal-add/{land_owner}',[AnimalDetailController::class,'store'])->name('animal_detail_store');
    /****************** end of land route***************************************/

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
        Route::resource('production-animal', ProductionAnimalController::class);
        Route::resource('seed-source', SeedSourceController::class);
        Route::resource('seed-supplier', SeedSupplierController::class);
        Route::resource('main-market', MainMarketController::class);
        Route::resource('unit', UnitController::class);
    });
});
