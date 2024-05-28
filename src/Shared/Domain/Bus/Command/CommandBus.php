<?php

declare(strict_types=1);

namespace Shared\Domain\Bus\Command;


interface CommandBus
{
    public function dispatch(Command $command): void;

    public function map(array $commands): void;
}
