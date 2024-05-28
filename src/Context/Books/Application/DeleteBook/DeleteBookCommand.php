<?php

namespace Kapli\Books\Application\DeleteBook;

use Shared\Domain\Bus\Command\Command;

final readonly class DeleteBookCommand implements Command
{
    public function __construct(private readonly int $id)
    {
    }

    public function id(): int
    {
        return $this->id;
    }
}
