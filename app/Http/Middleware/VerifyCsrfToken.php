<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'bitaps/paymentnotify',
        'bitaps/storepurchase',

        'admin/paypal/success/*',
        'admin/ravecallback',

        'user/paypal/success/*',
        'user/ravecallback',

        'paypal/success/*',
        'ravecallback',

        'user/paypal/storesuccess/*',
        'user/ravestorepur',

        'user/paypal/planpurchase/*',
        'user/raveplanpurchase',

        //
    ];
}
