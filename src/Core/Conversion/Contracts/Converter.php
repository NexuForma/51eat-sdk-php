<?php

declare(strict_types=1);

namespace Eat518\Core\Conversion\Contracts;

use Eat518\Core\Conversion\CoerceState;
use Eat518\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
