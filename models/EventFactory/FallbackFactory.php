<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\DefaultRenderDataProvider;
use app\models\RenderDataProvider\RendererDataProviderInterface;

//TODO: надо создать для каждого типа фабрику
class FallbackFactory implements HistoryObjectFactoryInterface
{
    /**
     * @var DefaultRenderDataProvider|null
     */
    private $rendererProvider = null;

    public function getRendererDataProvider(History $history): RendererDataProviderInterface
    {
        if ($this->rendererProvider === null) {
            $this->rendererProvider = new DefaultRenderDataProvider();
        }
        $this->rendererProvider->init($history);
        return $this->rendererProvider;
    }
}
