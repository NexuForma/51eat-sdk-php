<?php

declare(strict_types=1);

namespace Eat518\Customer\Events;

use Eat518\Core\Concerns\SdkUnion;
use Eat518\Core\Conversion\Contracts\Converter;
use Eat518\Core\Conversion\Contracts\ConverterSource;
use Eat518\Customer\Events\EventConfirmTicketOrderResponse\Data;

/**
 * @phpstan-import-type DataShape from \Eat518\Customer\Events\EventConfirmTicketOrderResponse\Data
 *
 * @phpstan-type EventConfirmTicketOrderResponseVariants = mixed|Data
 * @phpstan-type EventConfirmTicketOrderResponseShape = EventConfirmTicketOrderResponseVariants|DataShape
 */
final class EventConfirmTicketOrderResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [Data::class, 'mixed'];
    }
}
