<?php

namespace App\Console\Commands;

// use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class MakeEnum extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:enum {enum}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create enum template file';


    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Enums';
    }

    protected function getStub()
    {
        return __DIR__.'/Stubs/enum.stub';
    }

    protected function getOptions()
    {
        return [];
    }
}
