<?php

namespace app\controllers;

use app\models\sip_user_groups\TblSipUsersGroups;
use app\models\sip_user_groups\TblSipUsersGroupsSearch;
use app\pline\customs\PlineActiveController;

class SipUserGroupController extends PlineActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = TblSipUsersGroups::class;

    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            $model = new  TblSipUsersGroupsSearch();
            $query = $model->search(\Yii::$app->request->queryParams);
            $query->sort->defaultOrder = ['id' => SORT_ASC];
            $query->pagination->defaultPageSize = 10;
            return $query;
        };

        return $actions;
    }

    public function actionGetSipGroups()
    {
        $model = TblSipUsersGroups::find()
            ->select(['value' => 'id', 'label' => 'name'])
            ->where(['enable' => true])
            ->asArray()
            ->all();
        return $model;
    }
}
