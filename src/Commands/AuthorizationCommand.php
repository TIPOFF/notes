<?php

namespace Tipoff\Notes\Commands;

use Illuminate\Console\Command;

class NotesCommand extends Command
{
    public $signature = 'notes';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
