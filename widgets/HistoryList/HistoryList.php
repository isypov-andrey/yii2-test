<?php

namespace app\widgets\HistoryList;

use app\models\EventFactory\HistoryObjectFactoryCreator;
use app\models\search\HistorySearch;
use app\widgets\Export\Export;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

class HistoryList extends Widget
{
    /**
     * @var HistoryObjectFactoryCreator
     */
    private $objectFactoryCreator;

    public function __construct(
        HistoryObjectFactoryCreator $objectFactoryCreator,
        $config = []
    ) {
        parent::__construct($config);
        $this->objectFactoryCreator = $objectFactoryCreator;
    }

    /**
     * @return string
     */
    public function run()
    {
        $model = new HistorySearch();

        return $this->render('main', [
            'model' => $model,
            'linkExport' => $this->getLinkExport(),
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'objectFactoryCreator' => $this->objectFactoryCreator
        ]);
    }

    /**
     * @return string
     */
    private function getLinkExport()
    {
        $params = Yii::$app->getRequest()->getQueryParams();
        $params = ArrayHelper::merge([
            'exportType' => Export::FORMAT_CSV
        ], $params);
        $params[0] = 'site/export';

        return Url::to($params);
    }
}
