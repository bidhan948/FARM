<?php

use App\Http\Controllers\agriculture\AgricultureDetailController;
use App\Http\Controllers\animal\AnimalDetailController;
use App\Http\Controllers\bibaran\ReportController;
use App\Http\Controllers\dahsboard\MarketPlanDetailController;
use App\Http\Controllers\dashboard\AboutUsController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\NoticeController;
use App\Http\Controllers\dashboard\PublicationController;
use App\Http\Controllers\dashboard\QuestionController;
use App\Http\Controllers\detail\AgricultureAnimalDetailController;
use App\Http\Controllers\detail\PageController;
use App\Http\Controllers\enterperneurship\EnterperneurshipController;
use App\Http\Controllers\facility\FacilityDetailController;
use App\Http\Controllers\land\LandController;
use App\Http\Controllers\land_detail\LandDetailController;
use App\Http\Controllers\samuha\SamuhaDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\setting\{
    AnimalController,
    AreaController,
    BusinessController,
    CitizenShipController,
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
    MaritalStatusController,
    MarketingSystemController,
    OrganizationTypeController,
    ProductionAnimalController,
    RegionController,
    SeedSourceController,
    SeedSupplierController,
    UnitController
};

Auth::routes();

// for now not using any session authentication
Route::get('about-us', [DashboardController::class, 'aboutUs'])->name('dashboard.about_us');
Route::get('contact-us', [DashboardController::class, 'contactUs'])->name('dashboard.contact_us');
Route::get('dashboard/notice', [DashboardController::class, 'notice'])->name('dashboard.notice');
Route::get('download/notice/{notice}', [DashboardController::class, 'downloadNotice'])->name('dashboard.notice.download');
Route::get('publication', [DashboardController::class, 'publication'])->name('dashboard.publication');
Route::get('download/publication/{document}', [DashboardController::class, 'downloadPublication'])->name('dashboard.publication.download');
Route::get('farmer', [DashboardController::class, 'farmer'])->name('dashboard.farmer_detail');
Route::get('agriculture-animal', [DashboardController::class, 'agricultureAnimal'])->name('dashboard.animal_agriculture');
Route::get('agriculture-animal/{agriculture_animal_detail}', [DashboardController::class, 'agricultureAnimalShow'])->name('dashboard.agriculture_animal');
Route::get('agriculture-technology', [DashboardController::class, 'agricultureTechnologyShow'])->name('dashboard.agriculture_technology');
Route::get('agriculture-technology/{crop_type}', [DashboardController::class, 'agricultureTechnologyDetail'])->name('dashboard.agriculture_technology_detail');
Route::get('general-question/{crop_type}', [DashboardController::class, 'generalQuestionDetail'])->name('dashboard.question_detail');
Route::get('general-question/crop/{crop}', [DashboardController::class, 'generalQuestion'])->name('dashboard.question_crop');
Route::get('insurance-question', [DashboardController::class, 'insuranceQuestion'])->name('dashboard.insurance');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /****************************below route is all for Land*******************************************************************************************/
    Route::resource('land-owner', LandController::class);
    Route::get('Bibaran/{land_owner}', [ReportController::class, 'index'])->name('show_bibaran');
    Route::get('land-detail-add/{land_owner}', [LandDetailController::class, 'create'])->name('land_detail_add');
    Route::post('land-detail-add/{land_owner}', [LandDetailController::class, 'store'])->name('land_detail_store');
    Route::get('agriculture-detail-add/{land_owner}', [AgricultureDetailController::class, 'create'])->name('agriculture_detail');
    Route::post('agriculture-detail-add/{land_owner}', [AgricultureDetailController::class, 'store'])->name('agriculture_detail_store');
    Route::get('agriculture-detail/{land_owner}', [AgricultureDetailController::class, 'show'])->name('agriculture_detail_show');
    Route::get('animal-add/{land_owner}', [AnimalDetailController::class, 'create'])->name('animal_detail_add');
    Route::post('animal-add/{land_owner}', [AnimalDetailController::class, 'store'])->name('animal_detail_store');
    Route::get('animal-detail/{land_owner}', [AnimalDetailController::class, 'show'])->name('animal_detail_show');
    Route::get('enterperneurship-add/{land_owner}', [EnterperneurshipController::class, 'create'])->name('enterperneurship_detail_add');
    Route::post('enterperneurship-add/{land_owner}', [EnterperneurshipController::class, 'store'])->name('enterperneurship_detail_store');
    Route::get('enterperneurship-detail/{land_owner}', [EnterperneurshipController::class, 'show'])->name('enterperneurship_detail_show');
    Route::get('facility-add/{land_owner}', [FacilityDetailController::class, 'create'])->name('facility_detail_add');
    Route::post('facility-add/{land_owner}', [FacilityDetailController::class, 'store'])->name('facility_detail_store');
    Route::get('facility-detail/{land_owner}', [FacilityDetailController::class, 'show'])->name('facility_detail_show');
    Route::get('samuha-add/{land_owner}', [SamuhaDetailController::class, 'create'])->name('samuha_detail_add');
    Route::post('samuha-add/{land_owner}', [SamuhaDetailController::class, 'store'])->name('samuha_detail_store');
    Route::get('samuha-detail/{land_owner}', [SamuhaDetailController::class, 'show'])->name('samuha_detail_show');
    /****************** end of land route***********************************************************************************************************/
    /****************************below route is all for dashboard setting***************************************************************************/
    Route::get('aboutUs', [AboutUsController::class, 'index'])->name('about-us.index');
    Route::post('aboutUs', [AboutUsController::class, 'store'])->name('about-us.store');
    Route::put('aboutUs/{about_us}', [AboutUsController::class, 'update'])->name('about-us.update');
    Route::resource('notice', NoticeController::class);
    Route::resource('Publication', PublicationController::class);
    Route::resource('agriculture-animal-detail', AgricultureAnimalDetailController::class);
    Route::resource('agriculture-animal-detail.page', PageController::class)->except('edit,update,delete');
    Route::get('question-restore/{question_recover}', [QuestionController::class, 'recover'])->name('question.restore'); //this route is for trashed recover bcz RMB doesnt work on SD
    Route::resource('question', QuestionController::class);
    Route::get('general-question', [DashboardController::class, 'generalQuestionType'])->name('dashboard.question');
    Route::resource('market-plan', MarketPlanDetailController::class);
    /****************************end route for dashboard setting*******************************************************************************************/

    /****************** below route is all for setting**********************************************************************************************/
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
