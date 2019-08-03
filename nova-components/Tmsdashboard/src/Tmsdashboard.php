<?php

namespace Wasandev\Tmsdashboard;

use Laravel\Nova\Card;
use App\Models\Tenant\CompanyProfile;
use App\Models\Tenant\Tranjob;


class Tmsdashboard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';




    public function companyName()
    {
        $company = CompanyProfile::find(1);

        return $this->withMeta(['companyName' => $company->company_name]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'tmsdashboard';
    }
}
