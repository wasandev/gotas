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
use App\Models\Tenant\Employee;
use App\Policies\Tenant\EmployeePolicy;
use App\Models\Tenant\Customer;
use App\Policies\Tenant\CustomerPolicy;


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
