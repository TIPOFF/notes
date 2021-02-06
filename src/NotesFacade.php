<?php

namespace Tipoff\Notes;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tipoff\Notes\Notes
 */
class NotesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'notes';
    }
}
