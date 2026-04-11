<?php

namespace Eat518\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Eat518 Permission Denied Exception';
}
