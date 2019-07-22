<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeAggregation extends Command
{

    protected $signature = 'make:aggregation {aggregation} {model}';

    protected $description = 'Create aggregation template file';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle() {
        $name = $this->argument('aggregation');
        $model = $this->argument('model');

        $this->aggregationType(str_replace("Type", "" ,$name));
        $this->graphQLType($name, $model);
    }

    protected function getStub($type)
    {
        switch($type) {
            case 'aggregation':
            return file_get_contents(app_path("/Console/Commands/Stubs/aggregation.stub"));
                break;
            case 'graphqlType':
                return file_get_contents(app_path("/Console/Commands/Stubs/graphqlType.stub"));
                break;
        } 
    }


    protected function aggregationType($name) {

        $aggregationTemplate = str_replace(
            [
                '{{aggregation}}',
                '{{aggregationDescription}}',
                '{{aggregationType}}',
                '{{aggregationTypeDescription}}'
            ],
            [
                $name.'AggregationType',
                $name.' aggregation',
                strtolower($name),
                Str::plural($name)
            ],
            $this->getStub('aggregation')
        );
    
        file_put_contents(app_path("/GraphQL/Type/{$name}AggregationType.php"), $aggregationTemplate);
    }

    protected function graphQLType($name, $model) {
        
        $typeTemplate = str_replace(
            [
                '{{model}}',
                '{{typeDescription}}',
                '{{type}}'
            ],
            [
                $model,
                $name.' type',
                $name
            ],
            $this->getStub('graphqlType')
        );
    
        file_put_contents(app_path("/GraphQL/Type/{$name}.php"), $typeTemplate);
    }
}
