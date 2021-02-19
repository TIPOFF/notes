<?php

declare(strict_types=1);

namespace Tipoff\Notes;

use Tipoff\Notes\Models\Note;
use Tipoff\Notes\Policies\NotePolicy;
use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class NotesServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->hasPolicies([
                Note::class => NotePolicy::class,
            ])
            ->hasNovaResources([
                \Tipoff\Notes\Nova\Note::class,
            ])
            ->name('notes')
            ->hasConfigFile();
    }
}
