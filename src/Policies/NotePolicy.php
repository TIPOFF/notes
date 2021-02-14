<?php

declare(strict_types=1);

namespace Tipoff\Notes\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tipoff\Notes\Models\Note;
use Tipoff\Support\Contracts\Models\UserInterface as User;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view notes');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Note $note
     * @return mixed
     */
    public function view(User $user, Note $note)
    {
        return $user->hasPermissionTo('view notes');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create notes');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Note $note
     * @return mixed
     */
    public function update(User $user, Note $note)
    {
        return $user->hasPermissionTo('update notes');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Note $note
     * @return mixed
     */
    public function delete(User $user, Note $note)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Note $note
     * @return mixed
     */
    public function restore(User $user, Note $note)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Note $note
     * @return mixed
     */
    public function forceDelete(User $user, Note $note)
    {
        return false;
    }
}
