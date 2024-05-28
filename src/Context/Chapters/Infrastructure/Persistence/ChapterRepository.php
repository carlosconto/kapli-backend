<?php

namespace Kapli\Chapters\Infrastructure\Persistence;

use Kapli\Books\Domain\Book;
use Kapli\Books\Infrastructure\EloquentBookModel;
use Kapli\Chapters\Domain\Chapter;
use Kapli\Chapters\Domain\IChapterRepository;
use Kapli\Chapters\Infrastructure\EloquentChapterModel;

class ChapterRepository implements IChapterRepository
{
    public function __construct(private readonly EloquentChapterModel $chapterModel, private readonly EloquentBookModel $bookModel)
    {
    }

    public function add(Chapter $chapter): void
    {
        $bookDb = $this->bookModel->find($chapter->getBookId());

        if ($bookDb === null) {
            throw new \Exception('Book not found');
        }

        $chapterDb = $this->chapterModel->where('name', '=', $chapter->getName() . '')->first();

        if ($chapterDb !== null) {
            throw new \Exception('Chapter already exists');
        }

        $bookDb->chapters()->create(
            [
                'name' => $chapter->getName(),
                'slug' => $chapter->getSlug(),
                'description' => $chapter->getDescription(),
                'book_id' => $chapter->getBookId(),
                'created_at' => $chapter->getCreatedAt(),
                'updated_at' => $chapter->getUpdatedAt(),
            ]
        );
    }

    public function getChapterById(int $chapterId): ?Chapter
    {
        $chapterDb = $this->chapterModel->find($chapterId);

        if ($chapterDb === null) {
            return null;
        }

        $bookDb = $this->bookModel->find($chapterDb->book_id);

        $chapter = new Chapter(
            $chapterDb->id,
            $chapterDb->name,
            $chapterDb->description,
            $chapterDb->slug,
            $chapterDb->book_id,
            $chapterDb->created_at,
            $chapterDb->updated_at
        );

        $chapter->setBook($bookDb);

        return $chapter;
    }

    public function update(Chapter $chapter): void
    {
        $chapterDb = $this->chapterModel->find($chapter->getId());
        $chapterDb->name = $chapter->getName();
        $chapterDb->slug = $chapter->getSlug();
        $chapterDb->description = $chapter->getDescription();
        $chapterDb->book_id = $chapter->getBookId();
        $chapterDb->updated_at = $chapter->getUpdatedAt();
        $chapterDb->save();
    }

    public function delete(Chapter $chapter): void
    {
        $chapterDb = $this->chapterModel->find($chapter->getId());
        $chapterDb->delete();
    }
}
