<?php

namespace Eat518\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Not Found Exception';
}
