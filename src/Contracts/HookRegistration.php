<?php

namespace Zeus\Contracts;

abstract class HookRegistration
{
    /**
     * Register hooks & filters.
     * @return void
     */
    protected abstract function registerHooks();
}