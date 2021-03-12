<?php

declare(strict_types=1);

namespace Tipoff\Notes\Tests\Unit\Traits;

use Tipoff\Authorization\Models\User;
use Tipoff\Notes\Models\Note;
use Tipoff\Notes\Tests\TestCase;
use Tipoff\Notes\Traits\HasNotes;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Models\TestModelStub;

class HasNotesTest extends TestCase
{
    /** @test */
    public function add_note()
    {
        TestModel::createTable();

        /** @var TestModel $model */
        $model = TestModel::factory()->create();

        $this->actingAs(User::factory()->create());
        $model->addNote('ABCD');

        $notes = $model->notes;
        $this->assertCount(1, $notes);

        /** @var Note $note */
        $note = $notes->first();
        $this->assertEquals('ABCD', $note->content);
    }

    /** @test */
    public function add_multiple_notes()
    {
        TestModel::createTable();

        /** @var TestModel $model */
        $model = TestModel::factory()->create();

        $this->actingAs(User::factory()->create());
        $model->addNote('A');
        $model->addNote('B');
        $model->addNote('C');
        $model->addNote('D');

        $notes = $model->notes;
        $this->assertCount(4, $notes);

        $this->assertEquals(['D', 'C', 'B', 'A'], $notes->pluck('content')->toArray());
    }

    /** @test */
    public function delete_note()
    {
        TestModel::createTable();

        /** @var TestModel $model */
        $model = TestModel::factory()->create();

        $this->actingAs(User::factory()->create());
        $model->addNote('A');
        $model->addNote('B');
        $model->addNote('C');
        $model->addNote('D');

        $notes = $model->notes;
        $this->assertCount(4, $notes);

        $notes->get(2)->delete();
        $model->refresh();

        $notes = $model->notes;
        $this->assertCount(3, $notes);
        $this->assertEquals(['D', 'C', 'A'], $notes->pluck('content')->toArray());

        $this->assertDatabaseCount('notes', 4);
    }
}

class TestModel extends BaseModel
{
    use TestModelStub;
    use HasNotes;
}
