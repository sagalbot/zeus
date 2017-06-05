<?php
/**
 * Created by PhpStorm.
 * User: sagalbot
 * Date: 2017-06-04
 * Time: 8:46 PM
 */

namespace Zeus\Factories;


use League\Flysystem\Filesystem;
use Zeus\Contracts\Factory;

class Site implements Factory
{


    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * Options to pull from
     * wp_options table.
     *
     * @var array
     */
    private $options = [
        'siteurl',
        'home',
        'blogname',
        'template',
        'stylesheet',
        'users_can_register'
    ];

    /**
     * SiteConfig constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {

        $this->filesystem = $filesystem;
    }

    /**
     * @return array
     */
    public function generate()
    {
        $fields = $this->fields();

        $this->save($fields);

        return $fields;
    }

    /**
     * @return array
     */
    public function fields()
    {
        $fields = [];

        foreach( $this->options as $option ) {
            $fields[$option] = get_option($option);
        }

        return $fields;
    }

    /**
     * @param array $result
     * @return void
     */
    public function save(array $result)
    {
        $this->filesystem->put(config('paths.site'), json_encode($result, JSON_PRETTY_PRINT));
    }

    /**
     * @return Filesystem
     */
    public function filesystem()
    {
        return $this->filesystem;
    }
}