<?php

namespace Kapli\Chapters\Application;

use Illuminate\Http\Resources\Json\JsonResource;
use Shared\Domain\Bus\Query\Response;

final class ChapterResponse extends JsonResource implements Response
{

    public function __construct(
        private int $id,
        private int $book_id,
        private string $name,
        private string $slug,
        private string $description,
        private \DateTime $created_at,
        private ?\DateTime $updated_at,
        private ?\Kapli\Books\Domain\Book $book = null
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBookId(): int
    {
        return $this->book_id;
    }

    public function book(): ?\Kapli\Books\Domain\Book
    {
        return $this->book;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function description(): string
    {
        return $this->description;
    }    

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'book_id' => $this->book_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
            'book' => $this->book?->toArray()
        ];
    }
}
