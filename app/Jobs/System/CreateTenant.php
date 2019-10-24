<?php

namespace App\Jobs\System;

use App\Models\System\User;
use Illuminate\Bus\Queueable;
use App\Models\System\Website;
use App\Models\System\Hostname;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\System\TenantCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Illuminate\Database\Connection;


class CreateTenant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $fqdn;
    public $company_name;
    public $phoneno;
    public $taxid;


    public function __construct(User $user, $fqdn, $company_name, $phoneno, $taxid)
    {
        $this->user = $user;
        $this->fqdn = $fqdn;
        $this->company_name = $company_name;
        $this->phoneno = $phoneno;
        $this->taxid = $taxid;
    }

    public function handle()
    {
        //for local dev only remark when  production
        //app(Connection::class)->statement("SET GLOBAL validate_password_policy=LOW");

        $website = new Website;
        $website->user_id = $this->user->id;

        $website->company_name = $this->company_name;
        $website->phoneno = $this->phoneno;
        $website->taxid = $this->taxid;


        app(WebsiteRepository::class)->create($website);

        $hostname = new Hostname;
        $hostname->fqdn = $this->fqdn;
        app(HostnameRepository::class)->attach($hostname, $website);




        //$this->user->notify(new TenantCreated($hostname));
    }
}
