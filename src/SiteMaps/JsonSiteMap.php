<?php

namespace Zeus\SiteMaps;

use League\Flysystem\Filesystem;
use Zeus\Contracts\GenerateSiteMap;

class JsonSiteMap implements GenerateSiteMap
{

    /**
     * @var \wpdb
     */
    private $db;
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * JsonSiteMap constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;

        $this->bootstrap();
    }

    /**
     * Bootstrap wpdb.
     * @return void
     */
    private function bootstrap()
    {
        global $wpdb;

        $this->db = $wpdb;
    }

    /**
     * @return string
     */
    public function generate()
    {
        $result = $this->db->get_results($this->posts());

        $this->save($result);

        return $result;
    }

    /**
     * @param array $result
     * @return void
     */
    public function save(array $result)
    {
        $this->filesystem->put('compiled/map.json', json_encode($result, JSON_PRETTY_PRINT));
    }

    /**
     * @return string
     */
    protected function posts()
    {
        $posts = $this->db->posts;

        return "SELECT `guid`, `post_title`, `post_status` FROM $posts";
    }
}