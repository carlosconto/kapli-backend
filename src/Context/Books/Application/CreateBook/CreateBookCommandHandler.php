<?php

declare(strict_types=1);

namespace Kapli\Books\Application\CreateBook;

use Kapli\Books\Domain\Book;
use Kapli\Books\Domain\IBookRepository;
use Shared\Domain\Bus\Command\CommandHandler;

final readonly class CreateBookCommandHandler implements CommandHandler
{

    public function __construct(private readonly IBookRepository $bookRepository)
    {
    }

    public function __invoke(CreateBookCommand $command): void
    {
        $book = new Book(
            id: 0,
            title: $command->title(),
            author: $command->author(),
            description: $command->description(),
            genre: $command->genre(),
            status: 'available',
            createdAt: now(),
            updatedAt: null
        );

        $this->bookRepository->save($book);
    }
}
