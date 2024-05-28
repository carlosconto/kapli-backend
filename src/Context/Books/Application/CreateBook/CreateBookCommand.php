<?php

namespace Kapli\Books\Application\CreateBook;

use Shared\Domain\Bus\Command\Command;

final readonly class CreateBookCommand implements Command
{
    public function __construct(
        private string $author,
        private string $title,
        private string $description,
        private string $genre
    ) {
    }

    public function author(): string
    {
        return $this->author;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function genre(): string
    {
        return $this->genre;
    }
}
