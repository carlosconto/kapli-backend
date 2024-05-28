<?php

namespace Kapli\Books\Application;

use Illuminate\Http\Resources\Json\JsonResource;
use Shared\Domain\Bus\Query\Response;

class BookResponse extends JsonResource implements Response
{

    public function __construct(
        private int $id,
        private string $title,
        private string $author,
        private string $description,
        private string $genre,
        private string $status,
        private \DateTime $createdAt,
        private \DateTime $updatedAt,
        private array $chapters = []
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt?->format('Y-m-d H:i:s');
    }

    public function getChapters(): array
    {
        return $this->chapters;
    }

    public function toArray($request = null): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'genre' => $this->genre,
            'status' => $this->status,
            'chapters' => $this->chapters,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $this->updatedAt?->format('Y-m-d H:i:s')
        ];
    }
}
