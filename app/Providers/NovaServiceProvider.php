<?php

namespace App\Providers;


use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Wasandev\Tmsdashboard\Tmsdashboard;
use Dniccum\NovaDocumentation\NovaDocumentation;
use Wasandev\GotasMenugroup\GotasMenugroup;
use Jobcerto\NovaGrid\NovaGrid;


use App\Nova\CompanyProfile;
use App\Nova\Branch;
use App\Nova\Product;
use App\Nova\Category;
use App\Nova\Product_style;
use App\Nova\Unit;
use App\Nova\Car;
use App\Nova\Cartype;
use App\Nova\Carstyle;
use App\Nova\Tiretype;
use App\Nova\Product_image;
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
use App\Nova\Company_expense;
use App\Nova\Car_expense;
use App\Nova\SystemUser;


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
            //return in_array($user->email, [
            //    'wasandev@gmail.com',
            //]);
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
            (new GotasMenugroup)->withMeta([
                'group_icons' => [
                    'ข้อมูลบริษัท' => '<svg class="sidebar-icon" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><path fill="var(--sidebar-icon)" d="M11,14.7324356 C11.5978014,14.3866262 12,13.7402824 12,13 C12,11.8954305 11.1045695,11 10,11 C8.8954305,11 8,11.8954305 8,13 C8,13.7402824 8.40219863,14.3866262 9,14.7324356 L9,17 L11,17 L11,14.7324356 Z M13,6 C13,4.34314575 11.6568542,3 10,3 C8.34314575,3 7,4.34314575 7,6 L7,8 L13,8 L13,6 Z M4,8 L4,6 C4,2.6862915 6.6862915,0 10,0 C13.3137085,0 16,2.6862915 16,6 L16,8 L17.0049107,8 C18.1067681,8 19,8.90195036 19,10.0085302 L19,17.9914698 C19,19.1007504 18.1073772,20 17.0049107,20 L2.99508929,20 C1.8932319,20 1,19.0980496 1,17.9914698 L1,10.0085302 C1,8.8992496 1.8926228,8 2.99508929,8 L4,8 Z" id="Combined-Shape"></path></g></g></svg>',
                    'ฝ่ายบริการขนส่ง' => '<svg class="sidebar-icon" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><path fill="var(--sidebar-icon)" d="M10,1 L20,7 L10,13 L0,7 L10,1 Z M16.6666667,11 L20,13 L10,19 L0,13 L3.33333333,11 L10,15 L16.6666667,11 Z" id="Combined-Shape"></path></g></g></svg>',
                    'ฝ่ายขาย/การตลาด' => '<svg class="sidebar-icon" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><path fill="var(--sidebar-icon)" d="M19.9506248,11 C19.4489003,16.0533227 15.1853481,20 10,20 C4.4771525,20 0,15.5228475 0,10 C0,4.8146519 3.94667731,0.551099672 9,0.0493752426 L9,11 L19.9506248,11 L19.9506248,11 Z M19.8726884,8.4 C19.1906421,4.15869069 15.8413093,0.809357943 11.6,0.127311599 L11.6,8.4 L19.8726884,8.4 Z" id="Combined-Shape"></path></g></g></svg>',
                    'ฝ่ายงานรถบรรทุก' => '<svg class="sidebar-icon" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><path fill="var(--sidebar-icon)" d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-5.6-4.29a9.95 9.95 0 0 1 11.2 0 8 8 0 1 0-11.2 0zm6.12-7.64l3.02-3.02 1.41 1.41-3.02 3.02a2 2 0 1 1-1.41-1.41z" id="Combined-Shape"></path></g></g></svg>',
                    'ฝ่ายการเงิน/บัญชี' => '<svg class="sidebar-icon" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="icon-shape"><path fill="var(--sidebar-icon)" d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z"/></svg>'
                ]
            ])->width('1/3'),

            new NovaDocumentation,
            new NovaGrid,
            new \Cloudstudio\ResourceGenerator\ResourceGenerator(),


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
            Businesstype::class,
            Department::class,
            Position::class,
            Driving_license_type::class,
            Category::class,
            Product_style::class,
            Unit::class,
            Cartype::class,
            Carstyle::class,
            Tiretype::class,
            User::class,
            Employee::class,
            Product::class,
            Product_image::class,
            Car::class,
            Customer::class,
            Address::class,
            Vendor::class,
            Post::class,
            Comment::class,
            Tranjob::class,
            Tranjob_detail::class,
            Province::class,
            Car_expense::class,
            Company_expense::class,
            SystemUser::class,

        ]);
    }
}
