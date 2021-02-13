<?php

declare(strict_types=1);

namespace Tipoff\Notes;

use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tipoff\Notes\Models\Note;
use Tipoff\Notes\Policies\NotePolicy;

class NotesServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        parent::boot();
    }

    public function configurePackage(Package $package): void
    {
        $package->name('notes')
            ->hasConfigFile()
            ->hasTranslations();
    }

    public function registeringPackage()
    {
        Gate::policy(Note::class, NotePolicy::class);
    }
}
