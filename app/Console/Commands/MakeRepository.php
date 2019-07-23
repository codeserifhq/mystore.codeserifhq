<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{

    protected $signature = 'make:repository {repository} {model}';

    protected $description = 'Create repository template file';

    public function __construct()
    {
        parent::__construct();
    }
   

    public function handle() {
        $name = $this->argument('repository');
        $model = $this->argument('model');

        $this->repository($name, $model);
        $this->repositoryInterface($name);
    }

    protected function getStub($type)
    {
        switch($type) {
            case 'repository':
            return file_get_contents(app_path("/Console/Commands/Stubs/repository.stub"));
                break;
            case 'interface':
                return file_get_contents(app_path("/Console/Commands/Stubs/repositoryInterface.stub"));
                break;
        } 
    }


    protected function repository($name, $model) {

        $repositoryTemplate = str_replace(
            [
                '{{repository}}',
                '{{model}}',
                '{{modelVar}}',
                '{{interface}}'
            ],
            [
                $name,
                $model,
                strtolower($model),
                $name.'Interface'
            ],
            $this->getStub('repository')
        );
    
        file_put_contents(app_path("/Repositories/{$name}.php"), $repositoryTemplate);
    }

    protected function repositoryInterface($name) {
        
        $repositoryInterfaceTemplate = str_replace(
            [
                '{{interface}}'
            ],
            [
                $name.'Interface'
            ],
            $this->getStub('interface')
        );
    
        file_put_contents(app_path("/Contracts/Repositories/{$name}Interface.php"), $repositoryInterfaceTemplate);
    }
}
