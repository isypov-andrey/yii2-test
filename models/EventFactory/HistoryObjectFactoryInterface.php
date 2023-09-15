<?php

namespace app\models\EventFactory;

use app\models\History;
use app\models\RenderDataProvider\RendererDataProviderInterface;

interface HistoryObjectFactoryInterface
{
    public function getRendererDataProvider(History $history): RendererDataProviderInterface;
}
