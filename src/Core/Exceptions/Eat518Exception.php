<?php

namespace Eat518\Core\Exceptions;

class Eat518Exception extends \Exception
{
    /** @var string */
    protected const DESC = 'Eat518 Error';

    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($this::DESC.PHP_EOL.$message, $code, $previous);
    }
}
