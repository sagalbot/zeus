<?php

namespace Zeus;

use Illuminate\Container\Container;
use WP_CLI;
use Zeus\Commands\GenerateCommand;
use Zeus\Commands\TestCommand;
use Zeus\Commands\ZeusCommands;
use Zeus\SiteMaps\JsonSiteMap;
use Zeus\Traits\Singleton;

/**
 * Class App
 * @package TipTheDriver
 */
class App
{

    use Singleton;

    /**
     * @var Container
     */
    private $container;

    /**
     * App constructor.
     * Bootstrap if WooCommerce is active.
     */
    public function __construct()
    {
        $this->bootstrap();

        if (class_exists(WP_CLI::class)) {
            $this->registerCommands();
        }
    }


    /**
     * Bootstrap singletons.
     */
    private function bootstrap()
    {
        $this->container = new Container();

        $this->container()->singleton(JsonSiteMap::class, function () {
            return new JsonSiteMap();
        });
    }

    /**
     * Register WP CLI Commands
     */
    private function registerCommands()
    {
        WP_CLI::add_command('zeus', ZeusCommands::class);
    }

    /**
     * @return Container
     */
    public function container()
    {
        return $this->container;
    }

    /**
     * Run the install process.
     * Called on plugin activation.
     */
    static function install()
    {
    }
}