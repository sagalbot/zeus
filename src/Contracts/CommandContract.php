<?php

namespace Zeus\Contracts;

interface CommandContract
{
    /**
     * Handle the command.
     *
     * @return mixed
     */
    public function handle();
}