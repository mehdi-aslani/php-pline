<?php

namespace app\models\sip_users;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\sip_users\VwSipUsers;

/**
 * VwSipUsersSearch represents the model behind the search form of `app\models\sip_users\VwSipUsers`.
 */
class VwSipUsersSearch extends VwSipUsers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'profile_id', 'group_id'], 'integer'],
            [['uid', 'parallel', 'acl', 'password', 'effectiveCallerIdNumber', 'effectiveCallerIdName', 'outboundCallerIdNumber', 'outboundCallerIdName', 'profile_name', 'sip_user_group_name'], 'safe'],
            [['enable'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = VwSipUsers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'enable' => $this->enable,
            'profile_id' => $this->profile_id,
            'group_id' => $this->group_id,
        ]);

        $query->andFilterWhere(['like', 'uid', $this->uid])
            ->andFilterWhere(['like', 'parallel', $this->parallel])
            ->andFilterWhere(['like', 'acl', $this->acl])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'effectiveCallerIdNumber', $this->effectiveCallerIdNumber])
            ->andFilterWhere(['like', 'effectiveCallerIdName', $this->effectiveCallerIdName])
            ->andFilterWhere(['like', 'outboundCallerIdNumber', $this->outboundCallerIdNumber])
            ->andFilterWhere(['like', 'outboundCallerIdName', $this->outboundCallerIdName])
            ->andFilterWhere(['like', 'profile_name', $this->profile_name])
            ->andFilterWhere(['like', 'sip_user_group_name', $this->sip_user_group_name]);

        return $dataProvider;
    }
}
