<?php

declare(strict_types=1);

namespace Tipoff\Notes\Tests\Unit\Models;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Notes\Models\Note;
use Tipoff\Notes\Tests\TestCase;

class NoteModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create()
    {
        $model = Note::factory()->create();
        $this->assertNotNull($model);
    }
}
