<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\History
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $exportType string
 * @var $objectFactoryCreator HistoryObjectFactoryCreator
 */

use app\models\EventFactory\HistoryObjectFactoryCreator;
use app\models\History;
use app\widgets\Export\Export;

$filename = 'history';
$filename .= '-' . time();

ini_set('max_execution_time', 0);
ini_set('memory_limit', '2048M');

?>

<?= Export::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'ins_ts',
            'label' => Yii::t('app', 'Date'),
            'format' => 'datetime'
        ],
        [
            'label' => Yii::t('app', 'User'),
            'value' => function (History $model) {
                return isset($model->user) ? $model->user->username : Yii::t('app', 'System');
            }
        ],
        [
            'label' => Yii::t('app', 'Type'),
            'value' => function (History $model) {
                return $model->object;
            }
        ],
        [
            'label' => Yii::t('app', 'Event'),
            'value' => function (History $model) {
                return $model->eventText;
            }
        ],
        [
            'label' => Yii::t('app', 'Message'),
            'value' => function (History $model) use ($objectFactoryCreator) {
                $factory = $objectFactoryCreator->getFactory($model->object);
                $renderDataProvider = $factory->getRendererDataProvider($model);
                return strip_tags($renderDataProvider->getBodyText());
            }
        ]
    ],
    'exportType' => $exportType,
    'batchSize' => 2000,
    'filename' => $filename
]);