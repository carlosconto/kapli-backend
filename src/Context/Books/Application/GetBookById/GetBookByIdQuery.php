<?php

namespace Kapli\Books\Application\GetBookById;

use Shared\Domain\Bus\Query\Query;

final readonly class GetBookByIdQuery implements Query
{
    public function __construct(
        private readonly int $bookId
    ) {
    }

    public function bookId(): int
    {
        return $this->bookId;
    }
}
