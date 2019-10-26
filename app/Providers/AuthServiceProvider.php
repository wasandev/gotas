<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;
use App\Models\Tenant\User;
use App\Policies\Tenant\UserPolicy;
use \Pktharindu\NovaPermissions\Role;
use App\Policies\Tenant\RolePolicy;
use App\Models\Tenant\CompanyProfile;
use App\Policies\Tenant\CompanyProfilePolicy;
use App\Models\Tenant\Branch;
use App\Policies\Tenant\BranchPolicy;
use App\Models\Tenant\Branch_area;
use App\Models\Tenant\Branch_route;
use App\Models\Tenant\Branch_route_cost;
use App\Models\Tenant\Businesstype;
use App\Models\Tenant\Cartype;
use App\Policies\Tenant\BranchAreaPolicy;
use App\Models\Tenant\Department;
use App\Policies\Tenant\DepartmentPolicy;
use App\Models\Tenant\Employee;
use App\Policies\Tenant\EmployeePolicy;
use App\Models\Tenant\Customer;
use App\Policies\Tenant\CustomerPolicy;
use App\Models\Tenant\Charter_job_status;
use App\Policies\Tenant\CharterJobStatusPolicy;
use App\Models\Tenant\Position;
use App\Policies\Tenant\PositionPolicy;
use App\Models\Tenant\Driving_license_type;
use App\Models\Tenant\Carstyle;
use App\Models\Tenant\Tiretype;
use App\Models\Tenant\Car;
use App\Models\Tenant\Car_expense;
use App\Models\Tenant\Category;
use App\Models\Tenant\Charter_job;
use App\Models\Tenant\Charter_price;
use App\Models\Tenant\Charter_route;
use App\Models\Tenant\Charter_route_cost;
use App\Models\Tenant\Company_expense;
use App\Models\Tenant\Customer_product_price;
use App\Models\Tenant\Parcel;
use App\Models\Tenant\Product;
use App\Models\Tenant\Product_style;
use App\Models\Tenant\Productservice_price;
use App\Models\Tenant\Quotation;
use App\Models\Tenant\Routeto_branch;
use App\Models\Tenant\Routeto_branch_cost;
use App\Models\Tenant\Serviceprice;
use App\Models\Tenant\Unit;
use App\Models\Tenant\Service_charge;
use App\Models\Tenant\Vendor;
use App\Policies\Tenant\BranchRouteCostPolicy;
use App\Policies\Tenant\BranchRoutePolicy;
use App\Policies\Tenant\BusinesstypePolicy;
use App\Policies\Tenant\CarExpensePolicy;
use App\Policies\Tenant\CarPolicy;
use App\Policies\Tenant\CarstylePolicy;
use App\Policies\Tenant\CartypePolicy;
use App\Policies\Tenant\CategoryPolicy;
use App\Policies\Tenant\CharterJobPolicy;
use App\Policies\Tenant\CharterPricePolicy;
use App\Policies\Tenant\CharterRouteCostPolicy;
use App\Policies\Tenant\CharterRoutePolicy;
use App\Policies\Tenant\CompanyExpensePolicy;
use App\Policies\Tenant\CustomerProductPricePolicy;
use App\Policies\Tenant\DrivingLicenseTypePolicy;
use App\Policies\Tenant\ParcelPolicy;
use App\Policies\Tenant\ProductPolicy;
use App\Policies\Tenant\ProductServicePricePolicy;
use App\Policies\Tenant\ProductStylePolicy;
use App\Policies\Tenant\QuotationPolicy;
use App\Policies\Tenant\RoutetoBranchCostPolicy;
use App\Policies\Tenant\RoutetoBranchPolicy;
use App\Policies\Tenant\ServiceChargePolicy;
use App\Policies\Tenant\ServicePricePolicy;
use App\Policies\Tenant\TiretypePolicy;
use App\Policies\Tenant\UnitPolicy;
use App\Policies\Tenant\VendorPolicy;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        CompanyProfile::class => CompanyProfilePolicy::class,
        Branch::class => BranchPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Employee::class => EmployeePolicy::class,
        Customer::class => CustomerPolicy::class,
        Charter_job_status::class => CharterJobStatusPolicy::class,
        Branch_area::class => BranchAreaPolicy::class,
        Department::class => DepartmentPolicy::class,
        Position::class => PositionPolicy::class,
        Driving_license_type::class => DrivingLicenseTypePolicy::class,
        Cartype::class => CartypePolicy::class,
        Carstyle::class => CarstylePolicy::class,
        Tiretype::class => TiretypePolicy::class,
        Car::class => CarPolicy::class,
        Businesstype::class => BusinesstypePolicy::class,
        Category::class => CategoryPolicy::class,
        Product_style::class => ProductStylePolicy::class,
        Unit::class => UnitPolicy::class,
        Product::class => ProductPolicy::class,
        Parcel::class => ParcelPolicy::class,
        Productservice_price::class => ProductServicePricePolicy::class,
        Customer_product_price::class => CustomerProductPricePolicy::class,
        Serviceprice::class => ServicePricePolicy::class,
        Service_charge::class => ServiceChargePolicy::Class,
        Routeto_branch::class => RoutetoBranchPolicy::class,
        Branch_route::class => BranchRoutePolicy::class,
        Routeto_branch_cost::class => RoutetoBranchCostPolicy::class,
        Branch_route_cost::class => BranchRouteCostPolicy::class,
        Charter_route::class => CharterRoutePolicy::class,
        Charter_route_cost::class => CharterRouteCostPolicy::class,
        Charter_price::class => CharterPricePolicy::class,
        Quotation::class => QuotationPolicy::class,
        Charter_job::class => CharterJobPolicy::class,
        Vendor::class => VendorPolicy::class,
        Car_expense::class => CarExpensePolicy::class,
        Company_expense::class => CompanyExpensePolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {


        $this->registerPolicies();

        foreach (config('novapermissions.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }
        //
    }
}
