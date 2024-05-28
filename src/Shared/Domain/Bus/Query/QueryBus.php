<?php

declare(strict_types=1);

namespace Shared\Domain\Bus\Query;

interface QueryBus
{
    public function ask(Query $query): ?Response;

    public function map(array $queries): void;
}
