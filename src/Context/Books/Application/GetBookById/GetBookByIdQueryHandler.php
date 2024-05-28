<?php

namespace Kapli\Books\Application\GetBookById;

use Kapli\Books\Application\BookResponse;
use Kapli\Books\Domain\IBookRepository;
use Shared\Domain\Bus\Query\QueryHandler;

final readonly class GetBookByIdQueryHandler implements QueryHandler
{
    public function __construct(private IBookRepository $bookRepository)
    {
    }

    public function __invoke(GetBookByIdQuery $query): ?BookResponse
    {
        $book = $this->bookRepository->getById($query->bookId());

        return new BookResponse(
            id: $book->getId(),
            title: $book->getTitle(),
            author: $book->getAuthor(),
            description: $book->getDescription(),
            genre: $book->getGenre(),
            status: $book->getStatus(),
            createdAt: $book->getCreatedAt(),
            updatedAt: $book->getUpdatedAt(),
            chapters: $book->getChapters(),
        );
    }

}
