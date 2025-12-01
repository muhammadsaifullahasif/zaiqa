<?php

use App\Services\SettingsService;

if (!function_exists('settings')) {
    /**
     * Get the settings service instance or a specific setting value
     *
     * @param string|null $key
     * @param mixed $default
     * @return SettingsService|mixed
     */
    function settings($key = null, $default = null)
    {
        $settings = app('settings');

        if (is_null($key)) {
            return $settings;
        }

        return $settings->get($key, $default);
    }
}
