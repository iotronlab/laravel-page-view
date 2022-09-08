<?php

namespace Iotronlab\LaravelPageView\Commands;

use Illuminate\Console\Command;

class LaravelPageViewCommand extends Command
{
    public $signature = 'laravel-page-view';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
