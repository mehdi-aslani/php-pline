<?php

namespace app\controllers;

use app\models\sip_profile_parameters\TblSipProfileParameters;
use app\models\sip_profile_parameters\TblSipProfileParametersSearch;
use app\pline\customs\PlineActiveController;

class SppController extends PlineActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = TblSipProfileParameters::class;

    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            $model = new  TblSipProfileParametersSearch();
            $query = $model->search(\Yii::$app->request->queryParams);
            $query->sort->defaultOrder = ['id' => SORT_ASC];
            $query->pagination->defaultPageSize = 10;
            return $query;
        };

        return $actions;
    }
}
