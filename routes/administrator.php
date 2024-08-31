<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\FaciltyImageController;
use App\Http\Controllers\Backend\FaqImageController;
use App\Http\Controllers\PriceInfoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\AdministratorController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\WebsettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SolutionController;
use App\Http\Controllers\Backend\WorkstepController;
use App\Http\Controllers\Backend\FacilityController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ProjectcategoryController;
use App\Http\Controllers\Backend\PaintingtypeController;
use App\Http\Controllers\Backend\paintingcostController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\ServiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix'=>'administrator'], function () {
    // login
    Route::get('login', [AuthenticatedSessionController::class,'create'])->name('administrator.loginview');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('administrator.login');

    // logout
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    // reset password

});

Route::group(['prefix'=>'administrator','middleware' => ['auth.administrator:administrator']], function () {
    Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboard']);

    // role & permission
    Route::resource('roles', RoleController::class,['names'=>'administrator.roles']);
    Route::post('role/{id}', [RoleController::class,'update']);
    Route::get('role/get/data', [RoleController::class, 'roledata'])->name('administrator.role.data');
    Route::resource('administrators', AdministratorController::class,['names'=>'administrator.administrators']);
    Route::post('administrator/{id}', [AdministratorController::class,'update']);
    Route::get('administrator/get/data', [AdministratorController::class, 'administratordata'])->name('administrator.administrator.data');
    Route::put('administrator/status', [AdministratorController::class,'statusupdate']);

    //Blogs
    Route::resource('blogs', BlogController::class,['names'=>'administrator.blogs']);
    Route::get('blog/get/data', [BlogController::class, 'blogsData'])->name('administrator.blog.data');
    Route::post('blog/{id}', [BlogController::class, 'update']);
    Route::put('blog/status', [BlogController::class, 'statusupdate'])->name('blog.status');

    // Service
    Route::resource('service', ServiceController::class,['names'=>'administrator.service']);
    Route::get('service/get/data', [ServiceController::class, 'getData'])->name('administrator.service.get-data');
    Route::put('serviceCat/status', [ServiceController::class, 'statusUpdate']);

    // ServiceCategory
    Route::resource('service-category', ServiceCategoryController::class,['names'=>'administrator.service-category']);
    Route::get('service-category/get/data', [ServiceCategoryController::class, 'getData'])->name('administrator.get-data');
    Route::put('serviceCategory/status', [ServiceCategoryController::class, 'statusUpdate']);

    //Sliders
    Route::resource('sliders', SliderController::class,['names'=>'administrator.sliders']);
    Route::get('slider/get/data', [SliderController::class, 'sliderdata'])->name('administrator.slider.data');
    Route::post('slider/{id}', [SliderController::class, 'update']);
    Route::put('slider/status', [SliderController::class, 'statusupdate']);

    //Solutions
    Route::resource('solutions', SolutionController::class,['names'=>'administrator.solutions']);
    Route::get('solution/get/data', [SolutionController::class, 'solutiondata'])->name('administrator.solution.data');
    Route::post('solution/{id}', [SolutionController::class, 'update']);
    Route::put('solution/status', [SolutionController::class, 'statusupdate']);

    //About Us
    Route::resource('/about-us',AboutUsController::class)->names('administrator.aboutUs');


    //Work steps
    Route::resource('worksteps', WorkstepController::class,['names'=>'administrator.worksteps']);
    Route::get('workstep/get/data', [WorkstepController::class, 'workstepdata'])->name('administrator.workstep.data');
    Route::post('workstep/{id}', [WorkstepController::class, 'update']);
    Route::put('workstep/status', [WorkstepController::class, 'statusupdate']);

    //Banners
    Route::resource('/banners',BannerController::class)->names('administrator.banners');
    Route::get('/banner/get/data', [BannerController::class, 'bannerdata'])->name('administrator.banner.data');
    Route::put('banner/status/', [BannerController::class, 'statusupdate']);

    //facilities
    Route::resource('facilities', FacilityController::class,['names'=>'administrator.facilities']);
    Route::get('facility/get/data', [FacilityController::class, 'facilitydata'])->name('administrator.facility.data');
    Route::post('facility/{id}', [FacilityController::class, 'update']);
    Route::put('facility/status', [FacilityController::class, 'statusupdate']);

//  Facility Images
    Route::resource('/facility-images', FaciltyImageController::class)->names('administrator.facility_images');

//    FAQ Images and Consult
    Route::resource('/faq-consult-images', FaqImageController::class)->names('administrator.faq_consult_images');
    //clients
    Route::resource('clients', ClientController::class,['names'=>'administrator.clients']);
    Route::get('client/get/data', [ClientController::class, 'clientdata'])->name('administrator.client.data');
    Route::post('client/{id}', [ClientController::class, 'update']);
    Route::put('client/status', [ClientController::class, 'statusupdate']);
    //projectcategories
    Route::resource('projectcategories', ProjectcategoryController::class,['names'=>'administrator.projectcategories']);
    Route::get('projectcategory/get/data', [ProjectcategoryController::class, 'projectcategorydata'])->name('administrator.projectcategory.data');
    Route::post('projectcategory/{id}', [ProjectcategoryController::class, 'update']);
    Route::put('projectcategory/status', [ProjectcategoryController::class, 'statusupdate']);
    //projects
    Route::resource('projects', ProjectController::class,['names'=>'administrator.projects']);
    Route::get('project/get/data', [ProjectController::class, 'projectdata'])->name('administrator.project.data');
    Route::post('project/{id}', [ProjectController::class, 'update']);
    Route::put('project/status', [ProjectController::class, 'statusupdate']);
    //faqs
    Route::resource('faqs', FaqController::class,['names'=>'administrator.faqs']);
    Route::get('faq/get/data', [FaqController::class, 'faqdata'])->name('administrator.faq.data');
    Route::post('faq/{id}', [FaqController::class, 'update']);
    Route::put('faq/status', [FaqController::class, 'statusupdate']);

    //Appointment
    Route::resource('appointments', AppointmentController::class)->names('administrator.appointments');
    Route::get('appointment/get/data', [AppointmentController::class, 'appointmentdata'])->name('administrator.appointment.data');
    Route::post('appointment/{id}', [AppointmentController::class, 'update']);
    Route::put('appointment/status', [AppointmentController::class, 'statusupdate']);

    //paintingtype
    Route::resource('paintingtypes', PaintingtypeController::class,['names'=>'administrator.paintingtypes']);
    Route::get('paintingtype/get/data', [PaintingtypeController::class, 'paintingtypedata'])->name('administrator.paintingtype.data');
    Route::post('paintingtype/{id}', [PaintingtypeController::class, 'update']);
    Route::put('paintingtype/status', [PaintingtypeController::class, 'statusupdate']);

    // paintingcost
    Route::resource('paintingcosts', paintingcostController::class,['names'=>'administrator.paintingcosts']);
    Route::get('paintingcost/get/data', [paintingcostController::class, 'paintingcostdata'])->name('administrator.paintingcost.data');
    Route::post('paintingcost/{id}', [paintingcostController::class, 'update']);
    Route::put('paintingcost/status', [paintingcostController::class, 'statusupdate']);

    // websetting
    Route::resource('websettings', WebsettingController::class,['names'=>'administrator.websettings']);
    Route::post('/pixel/analytics/{id}', [WebsettingController::class, 'pixelanalytics']);
    Route::post('/basicinfo/update/{id}', [WebsettingController::class, 'sociallink']);
    Route::put('/metainfo/update/{id}', [WebsettingController::class, 'metainfo'])->name('administrator.meta.update');

    //Pricing Info
    Route::resource('pricinginfos', PriceInfoController::class,['names'=>'administrator.pricinginfos']);
    Route::get('pricinginfo/get/data', [PriceInfoController::class, 'pricinginfodata'])->name('administrator.pricinginfo.data');
    Route::post('pricinginfo/{id}', [PriceInfoController::class, 'update']);
    Route::put('pricinginfo/status', [PriceInfoController::class, 'statusupdate']);

    Route::get('/my/profile', [AdministratorController::class, 'myprofile']);
    Route::get('/account/settings', [AdministratorController::class, 'settings']);
    Route::post('/update/profile/', [AdministratorController::class, 'profileupdate']);

});

Route::post('/appointments', [AppointmentController::class,'store'])->name('administrator.appointments.store');

