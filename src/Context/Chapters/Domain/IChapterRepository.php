<?php

namespace Kapli\Chapters\Domain;

use Kapli\Books\Domain\Book;
use Kapli\Chapters\Domain\Chapter;

interface IChapterRepository
{
    public function add(Chapter $chapter): void;

    public function getChapterById(int $chapterId): ?Chapter;

    public function update(Chapter $chapter): void;

    public function delete(Chapter $chapter): void;
}
