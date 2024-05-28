<?php

namespace Kapli\Books\Application;

use Kapli\Books\Domain\Book;
use Shared\Domain\Bus\Query\Response;

class BooksResponse implements Response
{
    private array $books;

    public function __construct(BookResponse ...$books)
    {
        $this->books = $books;
    }

    public function books(): array
    {
        return $this->books;
    }

    public static function toResponse(): callable
    {
        return fn (Book $book)  => new BookResponse(
            $book->getId(),
            $book->getTitle(),
            $book->getAuthor(),
            $book->getDescription(),
            $book->getGenre(),
            $book->getStatus(),
            $book->getCreatedAt(),
            $book->getUpdatedAt(),
            $book->getChapters()
        );
    }
}
