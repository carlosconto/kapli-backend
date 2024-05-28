<?php

declare(strict_types= 1);

namespace Kapli\Domain;

use DomainException;

abstract class DomainError extends DomainException
{

    public function __construct()
    {
        parent::__construct($this->message(), $this->code());
    }

    abstract public function code(): int;

    abstract protected function message(): string;
}