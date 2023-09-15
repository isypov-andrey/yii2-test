<?php

namespace app\models\RenderDataProvider;

use app\models\DTO\ChangeDTO;
use app\models\History;

interface RendererDataProviderInterface
{
    public function init(History $history);

    /**
     * @return string[]
     */
    public function getIcons(): array;

    public function getBodyText(): ?string;

    public function getFooterText(): ?string;

    public function getComment(): ?string;

    /**
     * @return ChangeDTO[]
     */
    public function getChanges(): ?array;
}
