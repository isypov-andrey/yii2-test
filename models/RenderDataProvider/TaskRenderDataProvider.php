<?php

namespace app\models\RenderDataProvider;

use app\models\History;
use app\models\Task;

class TaskRenderDataProvider implements RendererDataProviderInterface
{
    /** @var Task|null */
    private $task;
    /**
     * @var History
     */
    private $history;

    public function init(History $history): void
    {
        $this->task = $history->task;
        $this->history = $history;
    }

    public function getIcons(): array
    {
        return ['fa-check-square', 'bg-yellow'];
    }

    public function getBodyText(): ?string
    {
        if ($this->task === null) {
            return $this->history->eventText;
        }
        return "{$this->history->eventText}: {$this->task->title}";
    }

    public function getFooterText(): ?string
    {
        if ($this->task === null) {
            return null;
        }
        return isset($this->task->customerCreditor->name) ? "Creditor: {$this->task->customerCreditor->name}" : '';
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
