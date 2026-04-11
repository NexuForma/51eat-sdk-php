<?php

namespace Eat518\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Rate Limit Exception';
}
