<?php

declare(strict_types=1);

namespace Eat518\Customer\CustomerLogoutAllResponse;

enum Message: string
{
    case ALL_TOKENS_REVOKED_SUCCESSFULLY = 'All tokens revoked successfully';
}
