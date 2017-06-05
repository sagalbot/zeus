<?php

namespace Zeus\Commands;

use WP_Query;
use Zeus\Contracts\CommandContract;
use Zeus\Factories\JsonSiteMap;
use Zeus\Factories\Site;

class GenerateCommand implements CommandContract
{

    /**
     * @var JsonSiteMap
     */
    private $siteMap;

    /**
     * @var Site
     */
    private $site;

    public function __construct(JsonSiteMap $siteMap, Site $site)
    {
        $this->siteMap = $siteMap;
        $this->site    = $site;
    }

    public function handle()
    {
        $this->siteMap->generate();
        $this->site->generate();
    }
}