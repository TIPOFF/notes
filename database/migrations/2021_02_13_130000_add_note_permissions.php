<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddNotePermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
            'view notes' => ['Owner', 'Staff'],
            'create notes' => ['Owner'],
            'update notes' => ['Owner']
        ];

        $this->createPermissions($permissions);
    }
}
