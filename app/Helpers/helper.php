<?php

if (! function_exists('tenant_fqdn')) {
    /**
     * Generates a fully qualified domain name for a tenant from a given subdomain.
     * 
     * @param  string $subdomain
     * @return string
     */
    function tenant_fqdn($subdomain)
    {
        return "{$subdomain}." . config('app.fqdn');
    }
}
