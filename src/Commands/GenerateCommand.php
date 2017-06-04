<?php

namespace Zeus\Commands;

use WP_Query;
use Zeus\Contracts\CommandContract;
use Zeus\SiteMaps\JsonSiteMap;

class GenerateCommand implements CommandContract
{

    private $siteMap;

    public function __construct(JsonSiteMap $siteMap)
    {
        $this->siteMap = $siteMap;
    }

    public function handle()
    {
        $this->siteMap->generate();
    }
}