<?php

use Zeus\App;

/**
 * Get an instance of the container,
 * or resolve a binding.
 *
 * @param bool $class
 * @return \Illuminate\Container\Container|mixed
 */
function app($class = false)
{
    $container = App::instance()->container();

    if ($class) {
        return $container->make($class);
    }

    return $container;
}


/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param  array|string $key
 * @param  mixed $default
 * @return mixed
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return app('config');
    }

    if (is_array($key)) {
        return app('config')->set($key);
    }

    return app('config')->get($key, $default);
}