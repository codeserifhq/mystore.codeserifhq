<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeMutator extends Command
{

    protected $signature = 'make:mutator {mutator} {model}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }
   

    public function handle() {
        $name = $this->argument('mutator');
        $model = $this->argument('model');

        $this->mutator($name, $model);
        $this->mutatorInterface($name);
    }

    protected function getStub($type)
    {
        switch($type) {
            case 'mutator':
            return file_get_contents(app_path("/Console/Commands/Stubs/mutator.stub"));
                break;
            case 'interface':
                return file_get_contents(app_path("/Console/Commands/Stubs/mutatorInterface.stub"));
                break;
        } 
    }


    protected function mutator($name, $model) {

        $mutatorTemplate = str_replace(
            [
                '{{interface}}',
                '{{model}}',
                '{{mutator}}'
            ],
            [
                $name.'Interface',
                $model,
                $name
            ],
            $this->getStub('mutator')
        );
    
        file_put_contents(app_path("/Mutators/{$name}.php"), $mutatorTemplate);
    }

    protected function mutatorInterface($name) {
        
        $mutatorInterfaceTemplate = str_replace(
            [
                '{{interface}}'
            ],
            [
                $name.'Interface'
            ],
            $this->getStub('interface')
        );
    
        file_put_contents(app_path("/Contracts/Mutators/{$name}Interface.php"), $mutatorInterfaceTemplate);
    }
}
