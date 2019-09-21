<?php

namespace App\Providers;

use Hyn\Tenancy\Environment;



use Illuminate\Support\ServiceProvider;
use App\Models\Tenant\Post;
use App\Observers\PostObserver;
use App\Models\Tenant\Comment;
use App\Observers\CommentObserver;
use App\Models\Tenant\Customer;
use App\Observers\CustomerObserver;
use App\Models\Tenant\Tranjob;
use App\Observers\TranjobObserver;
use App\Models\Tenant\CompanyProfile;
use App\Observers\CompanyProfileObserver;
use App\Models\Tenant\Address;
use App\Observers\AddressObserver;
use App\Models\Tenant\Branch;
use App\Observers\BranchObserver;
use App\Models\Tenant\Branch_area;
use App\Observers\BranchAreaObserver;
use App\Models\Tenant\Businesstype;
use App\Observers\BusinesstypeObserver;
use App\Models\Tenant\Car_expense;
use App\Observers\Car_expenseObserver;
use App\Models\Tenant\Car;
use App\Observers\CarObserver;
use App\Models\Tenant\Carstyle;
use App\Observers\CarstyleObserver;
use App\Models\Tenant\Cartype;
use App\Observers\CartypeObserver;
use App\Models\Tenant\Category;
use App\Observers\CategoryObserver;
use App\Models\Tenant\Company_expense;
use App\Observers\Company_expenseObserver;
use App\Models\Tenant\Department;
use App\Observers\DepartmentObserver;
use App\Models\Tenant\Driving_license_type;
use App\Observers\Driving_license_typeObserver;
use App\Models\Tenant\Employee;
use App\Observers\EmployeeObserver;
use App\Models\Tenant\Position;
use App\Observers\PositionObserver;
use App\Models\Tenant\Product_image;
use App\Observers\Product_imageObserver;
use App\Models\Tenant\Product_style;
use App\Observers\Product_styleObserver;
use App\Models\Tenant\Product;
use App\Models\Tenant\Productservice_price;
use App\Models\Tenant\Routeto_branch;
use App\Observers\ProductObserver;
use App\Models\Tenant\Tiretype;
use App\Observers\TiretypeObserver;
use App\Models\Tenant\Unit;
use App\Observers\UnitObserver;
use App\Models\Tenant\Vendor;

use App\Models\Tenant\Branch_route;
use App\Observers\BranchRouteObserver;

use App\Observers\ProductServicepriceObserver;
use App\Observers\RoutetoBranchObserver;
use App\Observers\VendorObserver;


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


        Post::observe(PostObserver::class);
        Comment::observe(CommentObserver::class);
        Customer::observe(CustomerObserver::class);
        Tranjob::observe(TranjobObserver::class);
        CompanyProfile::observe(CompanyProfileObserver::class);
        Address::observe(AddressObserver::class);
        Branch::observe(BranchObserver::class);
        Branch_area::observe(BranchAreaObserver::class);
        //Branch_route::observer(BranchRouteObserver::class);
        //Routeto_branch::observer(RoutetoBranchObserver::class);
        Businesstype::observe(BusinesstypeObserver::class);
        Car_expense::observe(Car_expenseObserver::class);
        Car::observe(CarObserver::class);
        Carstyle::observe(CarstyleObserver::class);
        Cartype::observe(CartypeObserver::class);
        Category::observe(CategoryObserver::class);
        Company_expense::observe(Company_expenseObserver::class);
        Department::observe(DepartmentObserver::class);
        Driving_license_type::observe(Driving_license_typeObserver::class);
        Employee::observe(EmployeeObserver::class);
        Position::observe(PositionObserver::class);
        Product_image::observe(Product_imageObserver::class);
        Product_style::observe(Product_styleObserver::class);
        Product::observe(ProductObserver::class);
        //Productservice_price::observer(ProductServicepriceObserver::class);
        Tiretype::observe(TiretypeObserver::class);
        Unit::observe(UnitObserver::class);
        Vendor::observe(VendorObserver::class);
    }
}
