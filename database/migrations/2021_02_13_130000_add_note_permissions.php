<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddNotePermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
            'view notes' => ['Owner', 'Executive', 'Staff'],
            'create notes' => ['Owner', 'Executive'],
            'update notes' => ['Owner', 'Executive']
        ];

        $this->createPermissions($permissions);
    }
}
