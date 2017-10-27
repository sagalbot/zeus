<?php

namespace Zeus\Commands;

class Kernel
{
    /**
     * Run e2e Test Suite.
     *
     * ## EXAMPLES
     *
     *     zeus test
     *
     * @when after_wp_load
     */
    public function test()
    {
        app(TestCommand::class)->handle();
    }

    /**
     * Generates a JSON SiteMap.
     *
     * ## EXAMPLES
     *
     *     zeus generate
     *
     * @when after_wp_load
     */
    public function generate()
    {
        app(GenerateCommand::class)->handle();
    }
}