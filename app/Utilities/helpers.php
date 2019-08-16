<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/**
 * Apply an "active" css class if current route matches
 * given route, with wildcard support
 */

function applyActive($route_name, $class = 'active') // 'data.motors.*
{
    $currentRouteName = Route::current()->getName();

    if (Str::endsWith($route_name, "*")) {
        $route_name = implode('.', explode('.', $route_name, -1));

        return (preg_match("/{$route_name}.+/i", $currentRouteName)) ? $class : '';
    }

    return ($currentRouteName === $route_name) ? $class : '';
}
