<?php

namespace Rez1pro\ServicePattern;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * new service class
 */
class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name') ?? $this->ask('What is the name of the service?');

        $name = str_replace('\\', '/', $name);
        $class = class_basename($name);

        $namespace = str_replace('/', '\\', dirname($name));
        if ($namespace === '.' || $namespace === '') {
            $namespace = '';
        } else {
            $namespace = '\\' . ltrim($namespace, '\\');
        }

        $fullNamespace = 'App\\Services' . $namespace;

        $path = app_path('Services/' . $name . '.php');

        if (File::exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        $stub = File::get(__DIR__ . '/service.stub');

        $stub = str_replace(
            ['{{ class }}', '{{ namespace }}'],
            [$class, $fullNamespace],
            $stub
        );

        File::put($path, $stub);

        $this->info('Service created successfully.');
    }
}
