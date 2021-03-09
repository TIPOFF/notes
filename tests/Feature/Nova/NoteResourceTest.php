<?php

declare(strict_types=1);

namespace Tipoff\Notes\Tests\Feature\Nova;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Authorization\Models\User;
use Tipoff\Notes\Models\Note;
use Tipoff\Notes\Tests\TestCase;

class NoteResourceTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function index()
    {
        Note::factory()->count(4)->create();

        $this->actingAs(self::createPermissionedUser('view notes', true));

        $response = $this->getJson('nova-api/notes')
            ->assertOk();

        $this->assertCount(4, $response->json('resources'));
    }

    /** @test */
    public function show()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create([
            'noteable_type' => User::class,
            'noteable_id' => $user->id,
        ]);

        $this->actingAs(self::createPermissionedUser('view notes', true));

        $response = $this->getJson("nova-api/notes/{$note->id}")
            ->assertOk();

        $this->assertEquals($note->id, $response->json('resource.id.value'));
    }
}
