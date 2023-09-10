<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\FaxRenderDataProvider;
use app\models\RenderDataProvider\RendererDataProviderInterface;

class FaxFactory implements HistoryObjectFactoryInterface
{
    /**
     * @var FaxRenderDataProvider|null
     */
    private $rendererProvider = null;

    public function getRendererDataProvider(History $history): RendererDataProviderInterface
    {
        if ($this->rendererProvider === null) {
            $this->rendererProvider = new FaxRenderDataProvider();
        }
        $this->rendererProvider->init($history);
        return $this->rendererProvider;
    }
}
