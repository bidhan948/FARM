<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
