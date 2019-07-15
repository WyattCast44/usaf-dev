<?php

use Illuminate\Support\Str;

/**
 * Apply an "active" css class if current route matches
 * given route, with wildcard support
 */

function applyActive($route_name, $class = 'active') // 'data.motors.*
{
    $currentRouteName = Route::current()->getName();

    if (Str::endsWith($route_name, "*")) {
        $route_name = implode('.', explode('.', $route_name, -1));
        $currentRouteName = implode('.', explode('.', $currentRouteName, -1));
    }

    return ($currentRouteName === $route_name) ? $class : '';
}

// function applyActive($route_name, $class = 'active') // 'data.motors.*
// {
//     $currentRouteName = Route::current()->getName();

//     if (Str::endsWith($route_name, "*")) {
//         $route_name = explode('*', str_replace('.', '', $route_name), -1);
//         $currentRouteName = array_slice(explode('.', $currentRouteName, -1), 0, count($route_name));
//     }

//     return ($currentRouteName === $route_name) ? $class : '';
// }
