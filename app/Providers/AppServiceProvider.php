<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\FaciltyImage;
use App\Models\FaqImage;
use App\Models\Paintingcost;
use App\Models\PriceInfo;
use Illuminate\Support\ServiceProvider;
use App\Models\Slider;
use App\Models\Websetting;
use App\Models\Solution;
use App\Models\Workstep;
use App\Models\Facility;
use App\Models\Client;
use App\Models\Projectcategory;
use App\Models\Project;
use App\Models\Faq;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View()->composer('*', function ($view) {
            $sliders = Slider::where('status', 'Active')->get();
            $view->with([
                'sliders' => $sliders,
            ]);
        });

        View()->composer('frontend.content.maincontent', function ($view) {
            $sliders = Slider::where('status', 'Active')->get();
            $solutions = Solution::where('status', 'Active')->get();
            $worksteps = Workstep::where('status', 'Active')->get();
            $facilitys = Facility::where('status', 'Active')->get();
            $clients = Client::where('status', 'Active')->get();
            $categorys = Projectcategory::where('status', 'Active')->get();
            $projects = Project::where('status', 'Active')->take(6)->get();
            $faqs = Faq::where('status', 'Active')->get();
            $banner= Banner::where('status',1)->first();
            $setting = Websetting::first();
            $aboutUs= AboutUs::first();
            $facility_images=FaciltyImage::first();
            $faq_consult_img= FaqImage::first();


            $view->with([
                'sliders' => $sliders,
                'solutions' => $solutions,
                'facilitys' => $facilitys,
                'clients' => $clients,
                'categorys' => $categorys,
                'projects' => $projects,
                'faqs' => $faqs,
                'worksteps' => $worksteps,
                'setting'=>$setting,
                'banner'=>$banner,
                'aboutUs'=>$aboutUs,
                'facility_images'=>$facility_images,
                'faq_consult_img'=>$faq_consult_img

            ]);
        });
        View()->composer('frontend.master', function ($view) {
            $setting = Websetting::first();
            $facilitys = Facility::where('status', 'Active')->get();
            $view->with([
                'setting' => $setting,
                'facilitys' => $facilitys,
            ]);
        });

        View()->composer('frontend.content.pages.service.interior', function ($view) {
            $facilitys = Facility::where('status', 'Active')->get();
            $worksteps = Workstep::where('status', 'Active')->get();
            $view->with([
                'facilitys' => $facilitys,
                'worksteps' => $worksteps,
            ]);
        });


        View()->composer('frontend.content.pages.priceing', function ($view) {
            $sliders = Slider::where('status', 'Active')->get();

            $price_info= PriceInfo::first();
            $package_1= Paintingcost::where('paintingtype_id',1)->take(16)->get();
            $package_2= Paintingcost::where('paintingtype_id',2)->take(8)->get();
            $banner= Banner::where('status',1)->first();
            $faq_consult_img= FaqImage::first();
            $solutions = Solution::where('status', 'Active')->get();

            $view->with([
                'sliders' => $sliders,
                'price_info'=>$price_info,
                'package_1'=>$package_1,
                'package_2'=>$package_2,
                'banner'=>$banner,
                'faq_consult_img'=>$faq_consult_img,
                'solutions' => $solutions,
            ]);



        });

        View()->composer('frontend.content.pages.service.allservices', function ($view) {
            $banner= Banner::where('status',1)->first();
            $sliders = Slider::where('status', 'Active')->get();
            $faq_consult_img= FaqImage::first();
            $solutions = Solution::where('status', 'Active')->get();
            $solutionLeftImg= Solution::where('status', 'Active')->where('img_position_type','left')->first();
            $solutionRightImg= Solution::where('status', 'Active')->where('img_position_type','right')->first();
            $view->with([
                'sliders' => $sliders,
                'banner'=>$banner,
                'faq_consult_img'=>$faq_consult_img,
                'solutions' => $solutions,
                'solutionLeftImg'=>$solutionLeftImg,
                'solutionRightImg'=>$solutionRightImg

            ]);
        });
    }
}
