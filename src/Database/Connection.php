<?php 

namespace Carpet\Database;

use Illuminate\Database\Capsule\Manager;

class Connection extends Manager
{
    public function __construct(array $settings)
    {
        parent::__construct();

        foreach($settings as $name => $setting) { 
            $this->addConnection($setting, $name);
        }

        $this->setAsGlobal();
        $this->bootEloquent();
    }
}