<?php

namespace CodeLinde\Navsmith\Commands;

use Illuminate\Console\Command;

class NavsmithCommand extends Command
{
    public $signature = 'laravel-navsmith';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
