<?php

declare(strict_types=1);

namespace Tipoff\Notes\Tests\Support\Providers;

use Tipoff\Notes\Nova\Note;
use Tipoff\TestSupport\Providers\BaseNovaPackageServiceProvider;

class NovaPackageServiceProvider extends BaseNovaPackageServiceProvider
{
    public static array $packageResources = [
        Note::class,
    ];
}
