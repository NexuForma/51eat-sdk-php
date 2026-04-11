<?php

namespace Eat518\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Authentication Exception';
}
