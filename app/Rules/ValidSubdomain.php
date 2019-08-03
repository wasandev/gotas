<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidSubdomain implements Rule
{
    public function passes($attribute, $value)
    {
        if (!preg_match('/^[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?$/', $value)) {
            return false;
        }

        if (in_array($value, [
            // Thank you https://github.com/laravel-validation-rules/subdomain.
            'www', 'admin', 'administrator', 'blog', 'dashboard', 'admindashboard',
            'assets', 'assets1', 'assets2', 'assets3', 'assets4', 'assets5',
            'images', 'img', 'files', 'videos', 'help', 'support', 'cname', 'test',
            'cache', 'api', 'api1', 'api2', 'api3', 'js', 'css', 'static', 'mail',
            'ftp', 'webmail', 'webdisk', 'ns', 'ns1', 'ns2', 'ns3', 'ns4', 'ns5',
            'register', 'pop', 'pop3', 'beta', 'stage', 'http', 'https', 'donate',
            'store', 'payment', 'payments', 'smtp', 'ad', 'admanager', 'ads',
            'adsense', 'adwords', 'about', 'abuse', 'affiliate', 'affiliates',
            'shop', 'client', 'clients', 'code', 'community', 'buy', 'cpanel',
            'whm', 'dev', 'developer', 'developers', 'docs', 'email', 'whois',
            'signup', 'gettingstarted', 'home', 'invoice', 'invoices', 'ios',
            'ipad', 'iphone', 'log', 'logs', 'my', 'status', 'network', 'networks',
            'new', 'newsite', 'news', 'partner', 'partners', 'partnerpage', 'popular',
            'wiki', 'redirect', 'random', 'public', 'registration', 'resolver', 'rss',
            'sandbox', 'search', 'server', 'servers', 'service', 'signin', 'signup',
            'sitemap', 'sitenews', 'sites', 'sms', 'sorry', 'ssl', 'staging',
            'development', 'stats', 'statistics', 'graph', 'graphs', 'survey',
            'surveys', 'talk', 'trac', 'git', 'svn', 'translate', 'upload', 'uploads',
            'video', 'validation', 'validations', 'email', 'webmaster', 'ww', 'wwww',
            'www1', 'www2', 'feeds', 'secure', 'demo', 'i', 'img', 'img1', 'img2',
            'img3', 'css1', 'css2', 'css3', 'js', 'js1', 'js2', 'billing',
            'calendar', 'forum', 'imap', 'login', 'manage', 'mx', 'pages', 'press',
            'videos', 'kb', 'knowledgebase',
        ])) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return __('ชื่อที่ระบุไม่สามารถใช้ได้ โปรดใช้ชื่ออื่น');
    }
}
