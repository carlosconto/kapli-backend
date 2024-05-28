<?php

namespace Kapli\Chapters\Application;

use Kapli\Chapters\Domain\Chapter;
use Shared\Domain\Bus\Query\Response;

final readonly class ChaptersResponse implements Response
{
    private array $chapters;

    public function __construct(ChapterResponse ...$chapters)
    {
        $this->chapters = $chapters;
    }

    public function chapters(): array
    {
        return $this->chapters;
    }

    public static function toResponse(): callable
    {
        return fn (Chapter $chapter)  => new ChapterResponse(
            $chapter->getId(),
            $chapter->getName(),
            $chapter->getSlug(),
            $chapter->getDescription(),
            $chapter->getBookId(),
            $chapter->getCreatedAt(),
            $chapter->getUpdatedAt(),
            $chapter->getBook()
        );
    }
}
