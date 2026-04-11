<?php

declare(strict_types=1);

namespace Eat518\Core\Conversion;

use Eat518\Core\Conversion\Concerns\ArrayOf;
use Eat518\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
