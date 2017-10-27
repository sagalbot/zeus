<?php

namespace Zeus;

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Zeus\Commands\Kernel;
use WP_CLI;

/**
 * Class App
 * @package Zeus
 */
class App
{

    /**
     * @var array
     */
    private static $instances = array();

    /**
     * @var Container
     */
    private $container;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->bootstrap();

        if (class_exists(WP_CLI::class)) {
            $this->registerCommands();
        }
    }

    /**
     * Register IoC Bindings.
     */
    private function bootstrap()
    {
        $this->container = new Container();

        $this->container()->bind(Filesystem::class, function () {
            return new Filesystem(new Local(plugin_dir_path(__DIR__)));
        });

        $this->container()->singleton('config', function () {
            return new Repository((new Config())->all());
        });
    }

    /**
     * Register WP CLI Commands
     */
    private function registerCommands()
    {
        WP_CLI::add_command('zeus', Kernel::class);
    }

    /**
     * @return Container
     */
    public function container()
    {
        return $this->container;
    }

    /**
     * Called on plugin activation.
     */
    static function install()
    {
    }

    /**
     * Provides access to a single instance of App.
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