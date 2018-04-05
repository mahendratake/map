<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\http\request;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'stripe/*',
        'http://code.jquery.com/jquery-1.9.1.js',
        'http://127.0.0.1:8000/*',
    ];


    protected function tokenMatch($request) {
    	$token = $request->ajax() ? $request->header('X-CSRF-TOKEN') : $request->input('_token');
    	return $request->session()->token() == $token;
    }
}
