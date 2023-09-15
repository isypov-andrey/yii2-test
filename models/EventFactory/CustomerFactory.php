<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\CustomerRenderDataProvider;
use app\models\RenderDataProvider\RendererDataProviderInterface;

class CustomerFactory implements HistoryObjectFactoryInterface
{
    /**
     * @var CustomerRenderDataProvider|null
     */
    private $rendererProvider = null;

    public function getRendererDataProvider(History $history): RendererDataProviderInterface
    {
        if ($this->rendererProvider === null) {
            $this->rendererProvider = new CustomerRenderDataProvider();
        }
        $this->rendererProvider->init($history);
        return $this->rendererProvider;
    }
}
