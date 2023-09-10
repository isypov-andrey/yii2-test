<?php

namespace app\models\RenderDataProvider;

use app\models\History;
use app\models\User;

class DefaultRenderDataProvider implements RendererDataProviderInterface
{
    /**
     * @var History
     */
    private $history;

    public function init(History $history): void
    {
        $this->history = $history;
    }

    public function getIcons(): array
    {
        return ['fa-gear', 'bg-purple-light'];
    }

    public function getBodyText(): ?string
    {
        return $this->history->eventText;
    }

    public function getFooterText(): ?string
    {
        return null;
    }

    public function getChanges(): ?array
    {
        return null;
    }

    public function getComment(): ?string
    {
        return null;
    }
}
