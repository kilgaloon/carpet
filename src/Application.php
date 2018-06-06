<?php

namespace Carpet;

class Application extends \Symfony\Component\Console\Application
{
    const VERSION = "0.0.1";

    public function __construct()
    {
        parent::__construct('Carpet', self::VERSION);

        $this->add(new Command\Migrate());
    }
}