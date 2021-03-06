<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddNotePermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
            'view notes',
            'create notes',
            'update notes'
        ];

        $this->createPermissions($permissions);
    }
}
