<?php

namespace Zeus\SiteMaps;

use Zeus\Contracts\GenerateSiteMap;

class JsonSiteMap implements GenerateSiteMap
{

    /**
     * @var \wpdb
     */
    private $db;

    /**
     * JsonSiteMap constructor.
     */
    public function __construct()
    {
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

        return json_encode($result);
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