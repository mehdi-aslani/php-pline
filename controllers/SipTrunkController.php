<?php

namespace app\controllers;

use app\models\sip_profiles\TblSipProfiles;
use app\models\sip_trunks\TblSipTrunks;
use app\models\sip_trunks\TblSipTrunksSearch;
use app\pline\customs\PlineActiveController;
use Yii;

class SipTrunkController extends PlineActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = TblSipTrunks::class;

    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            $model = new  TblSipTrunksSearch();
            $query = $model->search(\Yii::$app->request->queryParams);
            $query->sort->defaultOrder = ['id' => SORT_ASC];
            $query->pagination->defaultPageSize = 10;
            return $query;
        };
        return $actions;
    }
}
