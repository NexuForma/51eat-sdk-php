<?php

namespace Eat518\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Unprocessable Entity Exception';
}
