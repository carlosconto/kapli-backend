<?php

namespace Kapli\Books\Domain;

class Book
{
    private int $id;

    private string $title;

    private string $author;

    private ?string $description;

    private ?string $genre;

    private ?string $status;

    private \DateTime $createdAt;

    private ?\DateTime $updatedAt;

    private array $chapters;

    public function __construct(
        int $id,
        string $title,
        string $author,
        ?string $description,
        ?string $genre,
        ?string $status,
        \DateTime $createdAt,
        ?\DateTime $updatedAt
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
        $this->genre = $genre;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        $this->chapters = [];
    }

    public static function create(
        int $id,
        string $title,
        string $author,
        ?string $description,
        ?string $genre,
        ?string $status,
        \DateTime $createdAt,
        ?\DateTime $updatedAt
    )
    {
        return new self($id, $title, $author, $description, $genre, $status, $createdAt, $updatedAt);
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setChapters(array $chapters): void
    {
        $this->chapters = $chapters;
    }

    public function getChapters(): array
    {
        return $this->chapters;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setGenre(?string $genre): void
    {
        $this->genre = $genre;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'genre' => $this->genre,
            'status' => $this->status,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $this->updatedAt->format('Y-m-d H:i:s'),
        ];
    }
}
