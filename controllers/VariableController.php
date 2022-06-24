<?php

namespace app\controllers;

use app\models\variables\TblVariables;
use app\models\variables\TblVariablesSearch;
use app\pline\customs\PlineActiveController;

class VariableController extends PlineActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = TblVariables::class;

    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            $model = new  TblVariablesSearch();
            $query = $model->search(\Yii::$app->request->queryParams);
            $query->sort->defaultOrder = ['id' => SORT_ASC];
            $query->pagination->defaultPageSize = 10;
            return $query;
        };

        return $actions;
    }
}
