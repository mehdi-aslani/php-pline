<?php

namespace app\controllers;


use app\models\sip_profiles\TblSipProfiles;
use app\models\sip_profiles\TblSipProfilesSerach;
use app\pline\customs\PlineActiveController;
use Yii;

class SipProfileController extends PlineActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = TblSipProfiles::class;

    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            $model = new  TblSipProfilesSerach();
            $query = $model->search(\Yii::$app->request->queryParams);
            $query->sort->defaultOrder = ['id' => SORT_ASC];
            $query->pagination->defaultPageSize = 10;
            return $query;
        };
        unset($actions['delete']);

        return $actions;
    }

    public function actionDelete($id)
    {
        $model = TblSipProfiles::findOne(['id' => $id]);
        $model->delete();
        Yii::$app->response->statusCode = 200;
        return;

        Yii::$app->response->statusCode = 422;
        return [
            [
                "field" => "name",
                "message" => "It is not possible to delete this item because it is used."
            ]
        ];
    }
}