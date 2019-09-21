<?php

namespace App\Providers;


use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Wasandev\Tmsdashboard\Tmsdashboard;
use Dniccum\NovaDocumentation\NovaDocumentation;
//use Wasandev\GotasMenugroup\GotasMenugroup;
use Jobcerto\NovaGrid\NovaGrid;
//use Wasandev\TranjobEntry\TranjobEntry;


use App\Nova\CompanyProfile;
use App\Nova\Branch;
use App\Nova\Branch_area;
use App\Nova\Branch_route;
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
use App\Nova\Tranjob;
use App\Nova\Tranjob_detail;
use App\Nova\Province;
use App\Nova\District;
use App\Nova\SubDistrict;
use App\Nova\Company_expense;
use App\Nova\Car_expense;
use App\Nova\Role;
use App\Nova\Serviceprice;
use App\Nova\Serviceprice_item;
use App\Nova\Serviceprice_item_size;
use App\Nova\Serviceprice_item_weight;
use App\Nova\Routeto_branch;
use App\Nova\Productservice_price;

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
            //(new Tmsdashboard)->companyName(),
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
            CompanyProfile::class,
            Branch::class,
            Routeto_branch::class,
            Branch_area::class,
            Branch_route::class,
            Province::class,
            District::class,
            SubDistrict::class,
            Businesstype::class,
            Department::class,
            Position::class,
            Driving_license_type::class,
            Category::class,
            Product_style::class,
            Unit::class,
            Product::class,
            Productservice_price::class,
            Product_image::class,
            Serviceprice::class,
            Serviceprice_item::class,
            Serviceprice_item_size::class,
            Serviceprice_item_weight::class,

            Cartype::class,
            Carstyle::class,
            Tiretype::class,
            User::class,
            Role::class,
            Employee::class,
            Car::class,
            Customer::class,
            Address::class,
            Vendor::class,
            Post::class,
            Comment::class,
            Tranjob::class,
            Tranjob_detail::class,
            Car_expense::class,
            Company_expense::class,
            //Sustem Resource
            Systemuser::class,

        ]);
    }
}
