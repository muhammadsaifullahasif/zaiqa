<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Settings Facade
 *
 * @method static mixed get(string $key, mixed $default = null)
 * @method static void set(string $key, mixed $value)
 * @method static bool has(string $key)
 * @method static array all()
 * @method static void clearCache()
 *
 * @see \App\Services\SettingsService
 */
class Settings extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'settings';
    }
}
