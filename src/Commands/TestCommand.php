<?php

namespace Zeus\Commands;


use Zeus\Contracts\CommandContract;

class TestCommand implements CommandContract
{
    public function handle()
    {
        dd('running tests!');
    }
}