<?php

namespace Carpet\Command;

use Carpet\ConfigNotFoundException;
use Symfony\Component\Console\Command\Command;
/**
 * Base Command providing config loading
 */
abstract class AbstractCommand extends Command 
{   
    /**
     * List of configs
     *
     * @var array
    */
    private $config = [];
    /**
     * Load defined configs
     *
     * @return void
    */
    public function loadConfigs(array $configs)
    {
        foreach($configs as $config) {
            $file = dirname(dirname(__DIR__)) ."/config/". $config . ".php";
            if(! is_file($file)) {
                throw new ConfigNotFoundException($file);
            }

            $this->config[$config] = include dirname(dirname(__DIR__)) ."/config/". $config . ".php";
        }
    }
    /**
     * Get specific config by key
     *
     * @param string $config
     * @return array|null
    */
    public function getConfig(string $config)
    {
        return (isset($this->config[$config])) ? $this->config[$config] : null;
    }
}