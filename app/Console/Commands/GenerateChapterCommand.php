<?php

namespace App\Console\Commands;

use App\Models\Chapter;
use App\Models\Module;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateChapterCommand extends Command
{
    protected $signature = 'generate:slugss';

    protected $description = 'Generate slugs for existing chapters';

    public function handle()
    {
        $chapitres = Chapter::all();

        foreach ($chapitres as $chapitre) {
            $chapitre->slug = Str::slug($chapitre->nom);
            $chapitre->save();
        }

        $this->info('Slugs generated for existing chapters.');
    }
}
