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

    if( $class ) {
        return $container->make($class);
    }

    return $container;
}