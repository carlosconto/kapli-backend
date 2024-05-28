<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kapli\Books\Application\CreateBook\CreateBookCommand;
use Shared\Domain\Bus\Command\CommandBus;

class CreateBookController extends Controller
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function store(CreateBookRequest $request)
    {
        try {
            $this->commandBus->dispatch(
                new CreateBookCommand(
                    title: $request->title,
                    author: $request->author,
                    description: $request->description,
                    genre: $request->genre
                )
            );

            return new JsonResponse(['message' => 'Book created successfully.'], 201);
        } catch (\Throwable $th) {
            return new JsonResponse(['message' => $th->getMessage()], 400);
        }
    }
}
