<?php

namespace App\Console\Commands;

use App\Models\Domaine;
use App\Models\Module;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateSlugsCommand extends Command
{
    protected $signature = 'generate:slugs';

    protected $description = 'Generate slugs for existing domaines';

    public function handle()
    {
        $domaines = Domaine::all();

        foreach ($domaines as $domaine) {
            $domaine->slug = Str::slug($domaine->nom);
            $domaine->save();
        }

        $this->info('Slugs generated for existing domaines.');
    }
}
