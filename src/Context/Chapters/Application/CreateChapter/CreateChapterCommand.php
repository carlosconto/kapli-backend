<?php

namespace Kapli\Chapters\Application\CreateChapter;

use Shared\Domain\Bus\Command\Command;

final readonly class CreateChapterCommand implements Command
{
    public function __construct(
        private readonly int $bookId,
        private readonly string $name,
        private readonly string $description,
    )
    {

    }

    public function bookId(): int
    {
        return $this->bookId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function slug(): string
    {
        return str_replace(' ', '-', strtolower($this->name)); 
    }
}
