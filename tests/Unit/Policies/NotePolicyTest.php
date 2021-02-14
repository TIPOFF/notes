<?php 

declare(strict_types=1);

namespace Tipoff\Notes\Tests\Unit\Policies;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Notes\Models\Note;
use Tipoff\Notes\Tests\TestCase;
use Tipoff\Support\Contracts\Models\UserInterface;
use Tipoff\TestSupport\Models\User;

class NotePolicyTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function view_any()
    {
        /** @var User $authorizedUser */
        $authorizedUser = self::createPermissionedUser('view notes', true);

        /** @var User $unauthorizedUser */
        $unauthorizedUser = self::createPermissionedUser('view notes', false);

        $this->assertTrue($authorizedUser->can('viewAny', Note::class));
        $this->assertFalse($unauthorizedUser->can('viewAny', Note::class));
    }

    /**
     * @test
     * @dataProvider data_provider_for_all_permissions_as_creator
     * @param string $permission
     * @param UserInterface $user
     * @param bool $expected
     */
    public function all_permissions_as_creator(string $permission, UserInterface $user, bool $expected)
    {
        $note = Note::factory()->make([
            'creator_id' => $user,
        ]);

        $this->assertEquals($expected, $user->can($permission, $note));
    }

    public function data_provider_for_all_permissions_as_creator()
    {
        return [
            'view-true' => ['view', self::createPermissionedUser('view notes', true), true],
            'view-false' => ['view', self::createPermissionedUser('view notes', false), false],
            'create-true' => ['create', self::createPermissionedUser('create notes', true), true],
            'create-false' => ['create', self::createPermissionedUser('create notes', false), false],
            'update-true' => ['update', self::createPermissionedUser('update notes', true), true],
            'update-false' => ['update', self::createPermissionedUser('update notes', false), false],
            'delete-true' => ['delete', self::createPermissionedUser('delete notes', true), false],
            'delete-false' => ['delete', self::createPermissionedUser('delete notes', false), false],
        ];
    }

    /**
     * @test
     * @dataProvider data_provider_for_all_permissions_not_creator
     * @param string $permission
     * @param UserInterface $user
     * @param bool $expected
     */
    public function all_permissions_not_creator(string $permission, UserInterface $user, bool $expected)
    {
        $note = Note::factory()->make();

        $this->assertEquals($expected, $user->can($permission, $note));
    }

    public function data_provider_for_all_permissions_not_creator()
    {
        // Permissions are identical for creator or others
        return $this->data_provider_for_all_permissions_as_creator();
    }
}
