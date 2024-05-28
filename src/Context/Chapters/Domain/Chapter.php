<?php

namespace Kapli\Chapters\Domain;

use Kapli\Books\Domain\Book;

class Chapter
{
    private int $id;

    private string $name;

    private string $description;

    private string $slug;

    private int $bookId;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    private ?Book $book = null;

    public function __construct(int $id, string $name, string $description, string $slug, int $bookId, \DateTime $createdAt, \DateTime $updatedAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->slug = $slug;
        $this->bookId = $bookId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getBookId(): int
    {
        return $this->bookId;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): void
    {
        $this->book = $book;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'bookId' => $this->bookId,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
            'book' => $this->book?->toArray()
        ];
    }
}
