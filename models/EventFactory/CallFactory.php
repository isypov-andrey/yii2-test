<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\CallRenderDataProvider;
use app\models\RenderDataProvider\RendererDataProviderInterface;

class CallFactory implements HistoryObjectFactoryInterface
{
    /**
     * @var CallRenderDataProvider|null
     */
    private $rendererProvider = null;

    public function getRendererDataProvider(History $history): RendererDataProviderInterface
    {
        if ($this->rendererProvider === null) {
            $this->rendererProvider = new CallRenderDataProvider();
        }
        $this->rendererProvider->init($history);
        return $this->rendererProvider;
    }
}
