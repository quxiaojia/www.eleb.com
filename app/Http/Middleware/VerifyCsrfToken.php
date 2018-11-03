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
        //
        'businessList',
        'business',
        'login',
        'addressed.add',
        'addressed.index',
        'addressed.edit',
        'addressed.update',
        'cart.add',
        'cart.date',
        'register',
        'sms',
        'order.create',
        'order',
        'order.pay',
        'login.update_pwd',
        'login.reset'
    ];
}
