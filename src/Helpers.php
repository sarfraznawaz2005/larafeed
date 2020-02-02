<?php

if (!function_exists('larafeedButtonCSS')) {
    function larafeedButtonCSS()
    {
        $css = config('larafeed.button.position', 'right') . ':' . config('larafeed.button.x_margin', '25px') . ';';

        if (config('larafeed.button.animate')) {
            $css .= 'animation: pulse 1s infinite';
        }

        return $css;
    }
}

if (!function_exists('larafeedUser')) {
    function larafeedUser()
    {
        $user = new stdClass();

        $user->name = '';
        $user->email = '';

        if (auth()->check()) {
            $authUser = auth()->user();

            $user->email = $authUser->email ?? '';

            if (isset($authUser->first_name)) {
                $user->name = $authUser->first_name . ' ' . ($authUser->last_name ?? '');
            } else {
                $user->name = $authUser->name ?? '';
            }
        }

        return $user;
    }
}
