<?php

namespace Shared\Domain\Provider;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Kapli\Books\Application\CreateBook\CreateBookCommand;
use Kapli\Books\Application\CreateBook\CreateBookCommandHandler;
use Kapli\Books\Application\DeleteBook\DeleteBookCommand;
use Kapli\Books\Application\DeleteBook\DeleteBookCommandHandler;
use Kapli\Books\Application\GetBookById\GetBookByIdQuery;
use Kapli\Books\Application\GetBookById\GetBookByIdQueryHandler;
use Kapli\Books\Application\GetBooks\GetBooksQuery;
use Kapli\Books\Application\GetBooks\GetBooksQueryHandler;
use Kapli\Books\Domain\IBookRepository;
use Kapli\Books\Infrastructure\Persistence\BookRepository;
use Kapli\Chapters\Application\CreateChapter\CreateChapterCommand;
use Kapli\Chapters\Application\CreateChapter\CreateChapterCommandHandler;
use Kapli\Chapters\Domain\IChapterRepository;
use Kapli\Chapters\Infrastructure\Persistence\ChapterRepository;
use Shared\Domain\Bus\Command\CommandBus;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Infrastructure\Bus\Command\InMemoryCommandBus;
use Shared\Infrastructure\Bus\Query\InMemoryQueryBus;

final class Provider extends ServiceProvider
{

    public function register()
    {

        $this->app->singleton(QueryBus::class, InMemoryQueryBus::class);
        $this->app->singleton(CommandBus::class, InMemoryCommandBus::class);
        $this->app->singleton(IBookRepository::class, BookRepository::class);
        $this->app->singleton(IChapterRepository::class, ChapterRepository::class);

        /** @var CommandBus $bus */
        $bus = $this->app->make(CommandBus::class);

        $bus->map(
            [
                //TODO: Add commands
               CreateBookCommand::class => CreateBookCommandHandler::class,
               DeleteBookCommand::class => DeleteBookCommandHandler::class,

               CreateChapterCommand::class => CreateChapterCommandHandler::class
            ]
        );

        /** @var QueryBus $queryBus */
        $queryBus = $this->app->make(QueryBus::class);

        $queryBus->map(
            [
                //TODO: Add queries
                GetBooksQuery::class => GetBooksQueryHandler::class,
                GetBookByIdQuery::class => GetBookByIdQueryHandler::class
            ]
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // pagination extension for collection objects
        /* Collection::macro('paginate', function ($perPage, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage), // $items
                $this->count(),                  // $total
                $perPage,
                $page,
                [                                // $options
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        }); */
    }
}
