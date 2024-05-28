<?php

namespace Kapli\Books\Domain;

interface IBookRepository
{
    public function save(Book $book): void;

    public function getById(int $id): ?Book;

    public function getAll(): array;

    public function delete(int $id): void;
}
