<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kapli\Books\Application\DeleteBook\DeleteBookCommand;
use Shared\Domain\Bus\Command\CommandBus;

class DeleteBookController extends Controller
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function destroy($id)
    {
        try {
            $this->commandBus->dispatch(new DeleteBookCommand($id));

            return new JsonResponse(['message' => 'Book deleted successfully.'], 204);
        } catch (\Throwable $th) {
            return new JsonResponse(['message' => $th->getMessage()], 400);
        }
    }
}
