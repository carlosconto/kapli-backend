<?php

namespace Shared\Infrastructure\Bus\Query;

use Illuminate\Bus\Dispatcher;
use RuntimeException;
use Shared\Domain\Bus\Query\Query;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Domain\Bus\Query\Response;

class InMemoryQueryBus implements QueryBus
{
    private Dispatcher $bus;

    public function __construct()
    {
        $this->bus = app(Dispatcher::class);
    }

    public function ask(Query $query): ?Response
    {
        try {
            $response = $this->bus->dispatch($query);

            return $response;
        }/* catch (DomainError $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode());
        } */ 
        catch (\Throwable $exception) {
            throw new \Exception($exception->getMessage());
        } catch (RuntimeException) {
            $class = $query::class;
            throw new RuntimeException("Query handler $class not found");
        }
    }

    public function map(array $queries): void
    {
        $this->bus->map($queries);
    }
}
