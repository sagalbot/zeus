<?php

namespace Zeus;

use Zeus\Contracts\ConfigContract;

class Config implements ConfigContract
{

    /**
     * @var array
     */
    private $items = [
        'paths' => [
            'map' => 'tests/e2e/config/map.json',
            'site' => 'tests/e2e/config/site.json'
        ]
    ];

    /**
     * @return array
     */
    public function all()
    {
        return $this->items;
    }
}