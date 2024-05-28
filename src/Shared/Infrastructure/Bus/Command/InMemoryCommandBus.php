<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Bus\Command;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandBus;

class InMemoryCommandBus implements CommandBus
{

    private Dispatcher $bus;
    private DB $db;

    public function __construct()
    {
        $this->bus = app(Dispatcher::class);
        $this->db = app(DB::class);
    }

    /**
     * @throws \Exception
     */
    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } /*catch (RuntimeException) {
            $this->db->rollBack();

            $class = $command::class;
            throw new RuntimeException("The Command handler $class not found");
        } */ catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public function map(array $commands): void
    {
        $this->bus->map($commands);
    }
}
