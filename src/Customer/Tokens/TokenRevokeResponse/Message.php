<?php

declare(strict_types=1);

namespace Eat518\Customer\Tokens\TokenRevokeResponse;

enum Message: string
{
    case TOKEN_REVOKED_SUCCESSFULLY = 'Token revoked successfully';
}
