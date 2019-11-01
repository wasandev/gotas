<?php

namespace App\Providers;

use App\Models\Charter_jobs;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Wasandev\Tmsdashboard\Tmsdashboard;
use Dniccum\NovaDocumentation\NovaDocumentation;
//use Wasandev\GotasMenugroup\GotasMenugroup;
use Jobcerto\NovaGrid\NovaGrid;
use App\Nova\Metrics\CustomersPerDay;



use App\Nova\CompanyProfile;
use App\Nova\Branch;
use App\Nova\Branch_area;
use App\Nova\Branch_route;
use App\Nova\Branch_route_district;
use App\Nova\Product;
use App\Nova\Product_image;
use App\Nova\Category;
use App\Nova\Product_style;
use App\Nova\Unit;
use App\Nova\Car;
use App\Nova\Cartype;
use App\Nova\Carstyle;
use App\Nova\Tiretype;
use App\Nova\Customer;
use App\Nova\Address;
use App\Nova\Vendor;
use App\Nova\Post;
use App\Nova\Comment;
use App\Nova\User;
use App\Nova\Businesstype;
use App\Nova\Employee;
use App\Nova\Driving_license_type;
use App\Nova\Department;
use App\Nova\Position;
use App\Nova\Province;
use App\Nova\District;
use App\Nova\SubDistrict;
use App\Nova\Company_expense;
use App\Nova\Car_expense;
use App\Nova\Role;
use App\Nova\Parcel;
use App\Nova\Serviceprice;
use App\Nova\Serviceprice_item;
use App\Nova\Routeto_branch;
use App\Nova\Productservice_price;
use App\Nova\Customer_product;
use App\Nova\Customer_product_price;
use App\Nova\Charter_route;
use App\Nova\Charter_route_cost;
use App\Nova\Charter_price;
use App\Nova\Branch_route_cost;
use App\Nova\Routeto_branch_cost;
use App\Nova\Quotation;
use App\Nova\Service_charge;
use App\Nova\Charter_job;
use App\Nova\Charter_job_item;
use App\Nova\Charter_job_status;
use App\Nova\Charter_job_insurance;
use App\Nova\Metrics\CharterJobsPerDay;
//System resource

use App\Nova\Systemuser;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {


        Gate::define('viewNova', function ($user) {

            // $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();

            // if (is_null($hostname)  && $user->role === 'admin') {
            //     return true;
            // } elseif (is_object($hostname) &&  in_array($user->role, ['admin', 'member'])) {

            //     return true;
            // } else {

            //     return false;
            // }
            return true;
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new Tmsdashboard)->companyName(),
            (new CustomersPerDay)->width('1/3'),
            (new CharterJobsPerDay)->width('1/3'),

        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new NovaDocumentation,
            new NovaGrid,
            \Pktharindu\NovaPermissions\NovaPermissions::make()
                ->roleResource(Role::class),
            //new TranjobEntry(),


        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    { }

    /**
     * Register the application's Nova resources.
     *
     * @return void
     */
    protected function resources()
    {
        //Nova::resourcesIn(app_path('Nova'));

        Nova::resources([
            User::class,
            Role::class,
            CompanyProfile::class,
            Branch::class,
            Branch_area::class,
            Province::class,
            District::class,
            SubDistrict::class,
            Businesstype::class,
            Department::class,
            Position::class,
            Driving_license_type::class,
            Customer::class,
            Category::class,
            Product_style::class,
            Unit::class,
            Product::class,
            Parcel::class,
            Product_image::class,
            Productservice_price::class,
            Customer_product_price::class,
            Serviceprice::class,
            Serviceprice_item::class,
            Service_charge::class,

            Routeto_branch::class,
            Branch_route::class,
            Branch_route_district::class,
            Routeto_branch_cost::class,
            Branch_route_cost::class,

            Charter_route::class,
            Charter_route_cost::class,
            Charter_price::class,
            Quotation::class,
            Charter_job::class,
            Charter_job_item::class,
            Charter_job_status::class,
            Charter_job_insurance::class,
            Cartype::class,
            Carstyle::class,
            Tiretype::class,
            Employee::class,
            Car::class,
            Address::class,
            Vendor::class,
            Post::class,
            Comment::class,

            Car_expense::class,
            Company_expense::class,



        ]);
    }
}
