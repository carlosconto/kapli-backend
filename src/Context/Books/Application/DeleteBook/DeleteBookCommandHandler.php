<?php

namespace Kapli\Books\Application\DeleteBook;

use Kapli\Books\Domain\IBookRepository;
use Shared\Domain\Bus\Command\CommandHandler;

final readonly  class DeleteBookCommandHandler implements CommandHandler
{

    public function __construct(private readonly IBookRepository $bookRepository)
    {
    }

    public function __invoke(DeleteBookCommand $command): void
    {
        $this->bookRepository->delete($command->id());
    }
}
