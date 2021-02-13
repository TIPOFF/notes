<?php

declare(strict_types=1);

namespace Tipoff\Notes;

use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class NotesServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->name('notes')
            ->hasConfigFile();
    }
}
