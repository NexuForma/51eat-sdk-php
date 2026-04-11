<?php

namespace Eat518\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Conflict Exception';
}
