<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    protected $settings;

    public function __construct()
    {
        $this->loadSettings();
    }

    /**
     * Load all settings from database with caching
     */
    protected function loadSettings()
    {
        $this->settings = Cache::remember('app_settings', 3600, function () {
            return Setting::pluck('meta_value', 'meta_key')->toArray();
        });
    }

    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }

    /**
     * Get all settings
     *
     * @return array
     */
    public function all()
    {
        return $this->settings;
    }

    /**
     * Set a setting value (also updates database)
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        Setting::updateOrCreate(
            ['meta_key' => $key],
            ['meta_value' => $value]
        );

        $this->settings[$key] = $value;
        $this->clearCache();
    }

    /**
     * Check if a setting exists
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->settings[$key]);
    }

    /**
     * Clear the settings cache
     *
     * @return void
     */
    public function clearCache()
    {
        Cache::forget('app_settings');
        $this->loadSettings();
    }

    /**
     * Magic method to access settings as properties
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Magic method to check if a setting exists
     *
     * @param string $key
     * @return bool
     */
    public function __isset($key)
    {
        return $this->has($key);
    }

    /**
     * Allow array access to settings
     *
     * @param string $offset
     * @return mixed
     */
    public function offsetExists($offset): bool
    {
        return $this->has($offset);
    }

    public function offsetGet($offset): mixed
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value): void
    {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset): void
    {
        // Not implemented for settings
    }
}
