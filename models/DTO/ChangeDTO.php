<?php

namespace app\models\DTO;

class ChangeDTO
{
    /** @var string|null */
    public $from;
    /** @var string|null */
    public $to;

    public function __construct(
        ?string $from,
        ?string $to
    ) {
        $this->from = $from;
        $this->to = $to;
    }
}
