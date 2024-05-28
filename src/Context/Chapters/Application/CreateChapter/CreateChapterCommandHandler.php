<?php

namespace Kapli\Chapters\Application\CreateChapter;

use Kapli\Chapters\Domain\Chapter;
use Kapli\Chapters\Domain\IChapterRepository;
use Shared\Domain\Bus\Command\CommandHandler;

final readonly class CreateChapterCommandHandler implements CommandHandler
{
    public function __construct(
        private IChapterRepository $chapterRepository
    ) {
    }

    public function __invoke(CreateChapterCommand $command): void
    {
        $chapter = new Chapter(
            id: 0, 
            name: $command->name(), 
            description: $command->description(), 
            slug: $command->slug(), 
            bookId: $command->bookId(), 
            createdAt: now(), 
            updatedAt: now()
        );
    
        $this->chapterRepository->add($chapter);
    }
    
}
