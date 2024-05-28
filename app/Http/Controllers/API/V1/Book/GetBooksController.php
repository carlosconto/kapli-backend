<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kapli\Books\Application\BooksResponse;
use Kapli\Books\Application\GetBooks\GetBooksQuery;
use Shared\Domain\Bus\Query\QueryBus;

class GetBooksController extends Controller
{

    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    public function index()
    {
        /** @var BooksResponse $response */
        $response = $this->queryBus->ask(new GetBooksQuery());

        return new JsonResponse($response->books(), 200);
    }
}
