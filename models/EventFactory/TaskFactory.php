<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\RendererDataProviderInterface;
use app\models\RenderDataProvider\TaskRenderDataProvider;

class TaskFactory implements HistoryObjectFactoryInterface
{
    /**
     * @var TaskRenderDataProvider|null
     */
    private $rendererProvider = null;

    public function getRendererDataProvider(History $history): RendererDataProviderInterface
    {
        if ($this->rendererProvider === null) {
            $this->rendererProvider = new TaskRenderDataProvider();
        }
        $this->rendererProvider->init($history);
        return $this->rendererProvider;
    }
}
