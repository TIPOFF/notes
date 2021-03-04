<?php

declare(strict_types=1);

namespace Tipoff\Notes\Tests;

use Laravel\Nova\NovaCoreServiceProvider;
use Spatie\Permission\PermissionServiceProvider;
use Tipoff\Authorization\AuthorizationServiceProvider;
use Tipoff\Notes\NotesServiceProvider;
use Tipoff\Support\SupportServiceProvider;
use Tipoff\TestSupport\BaseTestCase;
use Tipoff\Notes\Tests\Support\Providers\NovaPackageServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SupportServiceProvider::class,
            AuthorizationServiceProvider::class,
            PermissionServiceProvider::class,
            NotesServiceProvider::class,
            NovaCoreServiceProvider::class,
            NovaPackageServiceProvider::class,
        ];
    }
}
