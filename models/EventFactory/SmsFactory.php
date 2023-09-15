<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\RendererDataProviderInterface;
use app\models\RenderDataProvider\SmsRenderDataProvider;

class SmsFactory implements HistoryObjectFactoryInterface
{
    /**
     * @var SmsRenderDataProvider|null
     */
    private $rendererProvider = null;

    public function getRendererDataProvider(History $history): RendererDataProviderInterface
    {
        if ($this->rendererProvider === null) {
            $this->rendererProvider = new SmsRenderDataProvider();
        }
        $this->rendererProvider->init($history);
        return $this->rendererProvider;
    }
}
