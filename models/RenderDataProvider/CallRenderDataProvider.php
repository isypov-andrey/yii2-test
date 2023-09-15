<?php

namespace app\models\RenderDataProvider;

use app\models\Call;
use app\models\History;
use app\models\User;

class CallRenderDataProvider implements RendererDataProviderInterface
{
    /** @var Call|null */
    private $call;
    /**
     * @var History
     */
    private $history;

    public function init(History $history): void
    {
        $this->call = $history->call;
        $this->history = $history;
    }

    public function getIcons(): array
    {
        if ($this->call === null) {
            return [];
        }
        $answered = $this->call->status == Call::STATUS_ANSWERED;
        return $answered ? ['md-phone', 'bg-green'] : ['md-phone-missed', 'bg-red'];
    }

    public function getBodyText(): ?string
    {
        if ($this->call === null) {
            return '<i>Deleted</i>';
        }
        $totalDisposition = $this->call->getTotalDisposition(false);
        return $this->call->totalStatusText . ($totalDisposition
                ? " <span class='text-grey'>" . $totalDisposition . "</span>"
                : "");
    }

    public function getFooterText(): ?string
    {
        if ($this->call === null) {
            return null;
        }
        return isset($this->call->applicant) ? "Called <span>{$this->call->applicant->name}</span>" : null;
    }

    public function getChanges(): ?array
    {
        return null;
    }

    public function getComment(): ?string
    {
        if ($this->call === null) {
            return null;
        }
        return $this->call->comment;
    }
}
