<?php

use app\models\EventFactory\HistoryObjectFactoryCreator;
use app\models\search\HistorySearch;

/**
 * @var $model HistorySearch
 * @var $objectFactoryCreator HistoryObjectFactoryCreator
 */

$factory = $objectFactoryCreator->getFactory($model->object);
$rendererDataProvider = $factory->getRendererDataProvider($model);
$data = [
    'eventText' => $model->eventText,
    'user' => $model->user,
    'body' => $rendererDataProvider->getBodyText(),
    'footer' => $rendererDataProvider->getFooterText(),
    'footerDatetime' => $model->ins_ts,
    'iconClass' => implode(' ', $rendererDataProvider->getIcons()),
    'changes' => $rendererDataProvider->getChanges(),
];
echo $this->render('_item_common', $data);
