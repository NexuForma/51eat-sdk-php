<?php

namespace Eat518\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Internal Server Exception';
}
