<?php

if (!function_exists('checked_asset')) {
    function checked_asset(string $src)
    {
        $secure = \Illuminate\Support\Facades\App::environment('local') ? false : true;
        return asset($src, $secure);
    }
}

if (!function_exists('get_url_array')) {
    function get_url_array()
    {
        $type = request()->url();
        return explode('/', $type);
    }
}

if (!function_exists('get_url_first')) {
    function get_url_first()
    {
        $type = get_url_array();
        return isset($type[4]) ? $type[4] : null;
    }
}

if (!function_exists('set_lang')) {
    function set_lang(string $url)
    {
        return '/' . app()->getLocale() . $url;
    }
}

if (!function_exists('current_lang')) {
    function current_lang()
    {
        return app()->getLocale();
    }
}

if (!function_exists('fallback_lang')) {
    function fallback_lang()
    {
        return config('app.fallback_locale') ?? 'en';
    }
}

if (!function_exists('languages')) {
    function languages()
    {
        return config('app.languages') ?? [fallback_lang()];
    }
}

if (!function_exists('parseLocale')) {
    function parseLocale()
    {
        $locale = \Request::segment(1);
        $languages = config('app.locales');

        if (in_array($locale, $languages, true)) {
            app()->setLocale($locale);
            return $locale;
        }

        return current_lang();
    }
}

if (!function_exists('get_url')) {
    function get_url()
    {
        $url = request()->path();
        return '/' . substr($url, 3, strlen($url));
    }
}
if (!function_exists('get_home_url')) {
    function get_home_url()
    {
        return '/' . current_lang();
    }
}

//if (!function_exists('translate')) {
//    function translate(string $key)
//    {
//        $translation = \App\Models\StaticTranslation::query()->where('key', $key)->first();
//        return $translation ? $translation->getTranslatedAttribute('value', current_lang()) : $key;
//    }
//}
