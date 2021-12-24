<?php

use App\Http\Controllers\agriculture\AgricultureDetailController;
use App\Http\Controllers\land\LandController;
use App\Http\Controllers\land_detail\LandDetailController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /****************** below route is all for Land****************************/
    Route::resource('land-owner', LandController::class);
    Route::get('land-detail-add/{land_owner}',[LandDetailController::class,'create'])->name('land_detail_add');
    Route::post('land-detail-add/{land_owner}',[LandDetailController::class,'store'])->name('land_detail_store');
    Route::get('agriculture-detail-add/{land_owner}',[AgricultureDetailController::class,'create'])->name('agriculture_detail');
    Route::post('agriculture-detail-add/{land_owner}',[AgricultureDetailController::class,'store'])->name('agriculture_detail_store');
    /****************** end of land route***************************************/

    /****************** below route is all for setting****************************/
    Route::prefix('settings')->group(function () {
        Route::resources([
            'gender' => config("constant.ROUTE_STRING") . '\GenderController',
            'marital-status' => config("constant.ROUTE_STRING") . '\MaritalStatusController',
            'citizenship-type' => config("constant.ROUTE_STRING") . '\CitizenShipController',
            'business' => config("constant.ROUTE_STRING") . '\BusinessController',
            'education-qualification' => config("constant.ROUTE_STRING") . '\EducationQualificationController',
            'irrigation-type' => config("constant.ROUTE_STRING") . '\IrrigationTypeController',
            'organization-type' => config("constant.ROUTE_STRING") . '\OrganizationTypeController',
            'ethnic-group' => config("constant.ROUTE_STRING") . '\EthnicGroupController',
            'region' => config("constant.ROUTE_STRING") . '\RegionController',
            'area' => config("constant.ROUTE_STRING") . '\AreaController',
            'land-type' => config("constant.ROUTE_STRING") . '\LandTypeController',
            'crop-type' => config("constant.ROUTE_STRING") . '\CropTypeController',
            'crop-area' => config("constant.ROUTE_STRING") . '\CropAreaController',
            'crop' => config("constant.ROUTE_STRING") . '\CropController',
            'facility' => config("constant.ROUTE_STRING") . '\GovNonGovFacilityController',
            'helping-organization' => config("constant.ROUTE_STRING") . '\HelpingOrganizationController',
            'animal' => config("constant.ROUTE_STRING") . '\AnimalController',
            'production-animal' => config("constant.ROUTE_STRING") . '\ProductionAnimalController',
            'seed-source' => config("constant.ROUTE_STRING") . '\SeedSourceController',
            'seed-supplier' => config("constant.ROUTE_STRING") . '\SeedSupplierController',
            'main-market' => config("constant.ROUTE_STRING") . '\MainMarketController',
            'marketing-system' => config("constant.ROUTE_STRING") . '\MarketingSystemController',
            'unit' => config("constant.ROUTE_STRING") . '\UnitController',
        ], ['except' => ['show', 'delete', 'create', 'edit']]);
    });
});
