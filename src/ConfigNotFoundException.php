<?php 

namespace Carpet;

use Exception;

class ConfigNotFoundException extends Exception 
{
    public function __construct(string $path)
    {
        parent::__construct("Configuration does not exist at path: $path");
    }
}