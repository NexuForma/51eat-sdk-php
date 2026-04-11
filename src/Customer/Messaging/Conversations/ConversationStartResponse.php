<?php

declare(strict_types=1);

namespace Eat518\Customer\Messaging\Conversations;

use Eat518\Core\Attributes\Required;
use Eat518\Core\Concerns\SdkModel;
use Eat518\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConversationShape from \Eat518\Customer\Messaging\Conversations\Conversation
 *
 * @phpstan-type ConversationStartResponseShape = array{
 *   data: Conversation|ConversationShape
 * }
 */
final class ConversationStartResponse implements BaseModel
{
    /** @use SdkModel<ConversationStartResponseShape> */
    use SdkModel;

    #[Required]
    public Conversation $data;

    /**
     * `new ConversationStartResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationStartResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationStartResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Conversation|ConversationShape $data
     */
    public static function with(Conversation|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Conversation|ConversationShape $data
     */
    public function withData(Conversation|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
