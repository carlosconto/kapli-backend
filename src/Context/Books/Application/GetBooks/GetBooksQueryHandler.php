<?php

namespace Kapli\Books\Application\GetBooks;

use Kapli\Books\Application\BooksResponse;
use Kapli\Books\Domain\IBookRepository;
use Shared\Domain\Bus\Query\QueryHandler;

use function Lambdish\Phunctional\map;

final readonly class GetBooksQueryHandler implements QueryHandler
{
    public function __construct(private readonly IBookRepository $bookRepository)
    {
    }

    public function __invoke(GetBooksQuery $query): BooksResponse
    {
        $books = $this->bookRepository->getAll();

        return new BooksResponse(...map(BooksResponse::toResponse(), $books));
    }
    
}
