<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kapli\Books\Application\GetBookById\GetBookByIdQuery;
use Kapli\Books\Application\GetBooks\GetBooksQuery;
use Shared\Domain\Bus\Query\QueryBus;

class GetBookByIdController extends Controller
{

    public function __construct(private readonly QueryBus $queryBus)
    {
    }
    
    public function show($id)
    {
        try {
            $book = $this->queryBus->ask(new GetBookByIdQuery($id));
            
            return new JsonResponse($book, 200);

        } catch (\Throwable $th) {
            return new JsonResponse(['message' => $th->getMessage()], 400);
        }
    }
}
