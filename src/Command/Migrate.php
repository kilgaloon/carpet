<?php 

namespace Carpet\Command;

use Carpet\Database\Connection;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends AbstractCommand
{
    public function __construct()
    {
        // prepare configs for usage
        $this->loadConfigs([
            "database",
            "map"
        ]);

        parent::__construct();
    }
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {        
        $this
            ->setName('migrate')
            ->setDescription('Run migration on databases');
    }
    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // create new connection to database
        $db = new Connection($this->getConfig('database'));
        
        foreach($this->getConfig('map') as $table => $class) {
            $data = Connection::table($table)->chunk(100, function($data) {
                foreach($data as $d) {
                    $model = new $class;
    
                    if ( !($model instanceof \Carpet\Database\Model)) {
                        throw \Exception("Model need to be instance of Carpet\\Database\\Model");
                    }
                    
                    $model->clone($d);
                }  
            }); 
        }
    }
}