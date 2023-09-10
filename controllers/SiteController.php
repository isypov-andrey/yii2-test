<?php

namespace app\controllers;

use app\models\EventFactory\HistoryObjectFactoryCreator;
use app\models\search\HistorySearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * @var HistoryObjectFactoryCreator
     */
    private $objectFactoryCreator;

    public function __construct($id, $module, HistoryObjectFactoryCreator $objectFactoryCreator, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->objectFactoryCreator = $objectFactoryCreator;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        $model = new HistorySearch();

        return $this->render('export', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'objectFactoryCreator' => $this->objectFactoryCreator,
            'exportType' => $exportType,
            'model' => $model
        ]);
    }
}
