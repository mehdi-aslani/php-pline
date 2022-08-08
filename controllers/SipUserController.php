<?php

namespace app\controllers;

use app\models\sip_profiles\TblSipProfiles;
use app\models\sip_user_groups\TblSipUsersGroups;
use app\models\sip_users\TblSipUsers;
use app\models\sip_users\VwSipUsersSearch;
use app\pline\customs\PlineActiveController;

class SipUserController extends PlineActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = TblSipUsers::class;

    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            $model = new  VwSipUsersSearch();
            $query = $model->search(\Yii::$app->request->queryParams);
            $query->sort->defaultOrder = ['id' => SORT_ASC];
            $query->pagination->defaultPageSize = 10;
            return $query;
        };

        return $actions;
    }

    public function actionGetSipUserOptions()
    {
        $profiles = TblSipProfiles::find()
            ->select(['value' => 'id', 'label' => 'name'])
            ->where(['enable' => true])
            ->asArray()
            ->all();

        $gropup = TblSipUsersGroups::find()
            ->select(['value' => 'id', 'label' => 'name'])
            ->asArray()
            ->all();
        return [
            'profileOptions' => $profiles,
            'sipGroupOptions' => $gropup,
        ];
    }
}
