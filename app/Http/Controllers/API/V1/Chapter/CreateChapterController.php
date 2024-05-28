<?php

namespace App\Http\Controllers\API\V1\Chapter;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateChapterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kapli\Chapters\Application\CreateChapter\CreateChapterCommand;
use Shared\Domain\Bus\Command\CommandBus;

class CreateChapterController extends Controller
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function store(CreateChapterRequest $request)
    {
        try {
            $this->commandBus->dispatch(
                new CreateChapterCommand(
                    name: $request->title,
                    description: $request->description,
                    bookId: $request->book_id
                )
            );

            return new JsonResponse(
                ['message' => 'Chapter created successfully.'],
                201
            );
        } catch (\Exception $e) {
            return new JsonResponse(
                ['message' => $e->getMessage()],
                400
            );
        }
    }
}
