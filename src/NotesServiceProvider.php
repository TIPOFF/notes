<?php

namespace Tipoff\Notes;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tipoff\Notes\Commands\NotesCommand;

class NotesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('notes')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_notes_table')
            ->hasCommand(NotesCommand::class);
    }
}
