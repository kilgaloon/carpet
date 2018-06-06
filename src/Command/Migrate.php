<?php 

namespace Carpet\Command;

use Illuminate\Support\Facades\DB;
use Carpet\Map;
use Carpet\Database\Table;
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
            $data = Connection::table($table)->take(5)->get();
            foreach($data as $d) {
                $model = new $class;
                $model->clone($d);
            }  
        }
    }
}