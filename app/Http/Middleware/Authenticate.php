<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        Log::info('Authenticate middleware triggered');
        if (! $request->expectsJson()) {
            return route('login.login');
        }
    }
}

