<?php

namespace Zeus\Traits;

/**
 * Class Singleton
 */
trait Singleton
{

    /**
     * @var array
     */
    private static $instances = array();

    /**
     * Provides access to a single instance of a module using the singleton pattern
     *
     * @return $this
     */
    public static function instance()
    {
        $module = get_called_class();

        if (!isset(self::$instances[$module])) {
            self::$instances[$module] = new $module();
        }

        return self::$instances[$module];
    }

}