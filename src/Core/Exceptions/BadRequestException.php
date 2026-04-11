<?php

namespace Eat518\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Bad Request Exception';
}
