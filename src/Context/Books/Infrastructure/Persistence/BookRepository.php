<?php

namespace Kapli\Books\Infrastructure\Persistence;

use Kapli\Books\Domain\Book;
use Kapli\Books\Domain\IBookRepository;
use Kapli\Books\Infrastructure\EloquentBookModel;

final readonly class BookRepository implements IBookRepository
{
    public function __construct(private readonly EloquentBookModel $model)
    {
    }

    public function getById(int $id): ?Book
    {
        $bookDb = $this->model->with('chapters')->find($id);

        if ($bookDb === null) {
            throw new \Exception('Book not found');
        }

        $book = Book::create(
            id: $bookDb->id,
            title: $bookDb->title,
            author: $bookDb->author,
            description: $bookDb->description,
            genre: $bookDb->genre,
            status: $bookDb->status,
            createdAt: $bookDb->created_at,
            updatedAt: $bookDb->updated_at,
        );
        
        $book->setChapters($bookDb->chapters->toArray());

        return $book;
    }

    public function getAll(): array
    {
        $bookDbs = $this->model->with('chapters')->get();


        $book = $bookDbs->map(
            function (EloquentBookModel $bookDb) {
                $book = Book::create(
                    id: $bookDb->id,
                    title: $bookDb->title,
                    author: $bookDb->author,
                    description: $bookDb->description,
                    genre: $bookDb->genre,
                    status: $bookDb->status,
                    createdAt: $bookDb->created_at,
                    updatedAt: $bookDb->updated_at
                );

                $book->setChapters($bookDb->chapters->toArray());

                return $book;
            }

        );

        return $book->toArray();
    }

    public function save(Book $book): void
    {
        $bookDb = $this->model->where('title', '=', $book->getTitle())->first();

        if ($bookDb !== null) {
            throw new \Exception('Book already exists');
        }

        $this->model->create([
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'genre' => $book->getGenre(),
            'status' => $book->getStatus(),
            'created_at' => $book->getCreatedAt(),
            'updated_at' => $book->getUpdatedAt(),
            'user_id' => 1,
        ]);
    }

    public function delete(int $id): void
    {
        $bookDb = $this->model->findOrFail($id);

        $bookDb->delete();
    }
}
