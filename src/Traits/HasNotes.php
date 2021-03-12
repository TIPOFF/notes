<?php

declare(strict_types=1);

namespace Tipoff\Notes\Traits;

use Illuminate\Support\Collection;
use Tipoff\Notes\Models\Note;

/**
 * @property Collection notes
 */
trait HasNotes
{
    public function addNote(string $content): self
    {
        $note = new Note();
        $note->content = $content;
        $note->noteable()->associate($this)->save();

        return $this;
    }

    public function copyNotesToTarget($target, ?\Closure $filter = null): self
    {
        $this->notes
            ->filter(function (Note $sourceNote) use ($filter) {
                return empty($filter) || ($filter)($sourceNote);
            })
            ->each(function (Note $sourceNote) use ($target) {
                // Create a copy, replacing the addressable with the target before saving
                $targetNote = $sourceNote->replicate();
                $targetNote->noteable()->associate($target)->save();
            });

        return $this;
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc');
    }
}
