<?php

namespace App\Console\Commands;

use App\Models\Module;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateModuleCommand extends Command
{

    protected $signature = 'generate:slug';

    protected $description = 'Generate slugs for existing modules';
    public function handle()
    {
        $modules = Module::all();

        foreach ($modules as $module) {
            $module->slugs = Str::slug($module->nom);
            $module->save();
        }

        $this->info('Slugs generated for existing domaines.');
    }
}
